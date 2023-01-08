<?php

namespace App\Http\Controllers;

use App\Models\Hand;
use App\Models\Notification;
use App\Models\PaymentHistory;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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
        // dd($request->all());
        try {
            // dd($request->all());
            $user= User::where('uuid', $request->sponser_uuid);
            // dd($user);
            $user->update([
                // 'is_approved_sponsor' => 1,
            ]);
            $hands = Hand::where('parent_id', $request->id)->count();
            // dd($hands);
            // $hands:: parent_id child_id
            if($hands < 11){
                // dd($request->id, $request->sponser_uuid);
                Hand::create([
                    'parent_id' => $request->id,
                    'child_id' => $request->sponser_uuid,
                    // dd($request->id, $request->sponser_uuid)
                ]);
                // 
            }else{
                return redirect()->route('home')->withMessage('You can not add more than 10 users!');
            }
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
}
