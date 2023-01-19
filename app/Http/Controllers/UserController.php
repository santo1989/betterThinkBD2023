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


    public function profiles()
    {
        return view('backend.Admin.users.profiles');
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
        $roles = Role::all();

        return view('backend.Admin.users.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function edit(User $user)
    {
        $roles = Role::latest()->get();
        return view('backend.Admin.users.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function show(User $user)
    {
        $roles = Role::latest()->get();
        return view('backend.Admin.users.show', [
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

    public function approvePage(Notification $notification)
    {
        return view('backend.user_interface.approved.approve', compact('notification'));
    }

    public function approve(Request $request)
    {
        try{
            DB::beginTransaction();
            $child_user = User::where('id', $request->child_id)->first();

            if($request->type == 'sponsor'){
                $hand = Hand::create([
                    'parent_id' => Auth::id(),
                    'child_id' => $request->child_id
                ]);

                $child_user->update([
                    'is_approved_sponsor' => 1
                ]);

                $parent_id = $hand->parent_id;

                for($i=1; $i<7; $i++){
                    if(!is_null($parent_id)){
                        $type = Type::where("name", "level_$i")->first();
                        $point = $type->point->point;
                    }else{
                        break;
                    }

                    $parentUser = User::find($parent_id);
                    $parentUser->point = $parentUser->point+$point;
                    $parentUser->update();

                    $parentUser->notifications()->create([
                        "type" => "level_$i",
                        "message" => "$point for refer a user $parent_id",
                        "status" => NotificationStatus::UNREAD()
                    ]);


                    $hand = Hand::where('child_id', $parent_id)->first();
//                    dd($hand->id);
                    if(!is_null($hand)){
                        $parent_id = $hand->parent_id;
                    }else{
                        $parent_id = null;
                    }
                }
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
