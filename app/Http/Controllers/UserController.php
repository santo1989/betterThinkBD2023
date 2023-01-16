<?php

namespace App\Http\Controllers;

use App\Enums\NotificationStatus;
use App\Models\Hand;
use App\Models\Notification;
use App\Models\PaymentHistory;
use App\Models\Role;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function home()
    {
        return view('backend.home');
    }
    public function index()
    {

        $usersCollection = User::latest();

        if (request()->has('role_id')) {
            $usersCollection = $usersCollection
                ->where('role_id', request('role_id'));
        }

        if (request('search')) {
            $usersCollection = $usersCollection
                ->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('email', 'like', '%' . request('search') . '%');
        }

        $users = $usersCollection;
        // dd($users);
        $roles = Role::all();

        return view('backend.users.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        return view('backend.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, User $user)
    {
        try {

            $requestData = [
                'name' => $request->name,
                'role_id' => $request->role_id,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ];



            $user->update($requestData);


            return redirect()->route('users.index')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->withMessage('Successfully Deleted!');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function is_approved_sponsor(Request $request, User $user)
    {
        try {
            $sponsor= User::where('uuid', $request->id)->first();
            $user= User::where('uuid', $request->sponser_uuid)->first();

            Hand::create([
                'parent_id' => $sponsor->id,
                'child_id' => $user->id,
            ]);


            $user->update([
                'is_approved_sponsor' => 1
            ]);

            if($user->is_approved_payment == 1){
                $notification = Notification::find($request->notification_id);
                $notification->update([
                    'status' => 'read',
                ]);
            }
            return redirect()->route('home')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function is_approved_payment(Request $request, User $user)
    {
        try {
            $user->update([
                'is_approved_payment' =>1,
            ]);
            $payment = PaymentHistory::create([
                'user_id' => Auth::user()->uuid,
                'details' => $request->details,
                'payment_id'=> Auth::user()->uuid,
                'sponsor_id' => $request->sponsor_id,
                'product_id' => $request->product_id,
                'point' => $request->point,
            ]);

            if($user->is_approved_sponsor == 1){
                $notification = Notification::find($request->notification_id);
                $notification->update([
                    'status' => 'read',
                ]);
            }

            return redirect()->route('home')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function is_rejected(Request $request, User $user)
    {
        try {

            return redirect()->route('home')->withMessage('Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function approvePage(Notification $notification)
    {
        return view('backend.approved.approve', compact('notification'));
    }

    public function approve(Request $request)
    {
        try{
            DB::beginTransaction();
            $child_user = User::where('id', $request->child_id)->first();

            if($request->type == 'sponsor'){
                $child_user->update([
                    'is_approved_sponsor' => 1
                ]);
            }

            if($request->type == 'payment'){

                $registerFee = Type::where('name', 'register')->first()->point->point;

                if(Auth::user()->point < $registerFee){
                    return redirect()->back()->withInput()->withErrors("You don't have enough point.");
                }

                $userPoint = Auth::user()->point - $registerFee;

                Auth::user()->update([
                    'point' => $userPoint
                ]);

                PaymentHistory::create([
                    'user_id' => Auth::id(),
                    'point' => $registerFee,
                    'Details' => 'User Registration'
                ]);

                $child_user->update([
                    'is_approved_payment' => 1
                ]);
            }

            if($child_user->is_approved_sponsor == 1 && $child_user->is_approved_payment == 1){
                $child_user->update([
                    'is_approve' => 1
                ]);
            }

            $notification = Notification::where('id', $request->notification_id)->first();
            $notification->update([
                'status' => NotificationStatus::READ()
            ]);
            DB::commit();
            return redirect()->route('home')->withMessage('Successfully approved '.$request->type);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($e);
        }
    }
}
