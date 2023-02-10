<?php

namespace App\Http\Controllers;

use App\Enums\NotificationStatus;
use App\Enums\PaymentType;
use App\Models\Hand;
use App\Models\Notification;
use App\Models\PaymentHistory;
use App\Models\Role;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
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

        $users = $usersCollection->get();
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

    public function profiles()
    {
        return view('backend.Admin.users.profiles');
    }

    public function profile_edit(User $user)
    {
        $roles = Role::latest()->get();
        return view('backend.Admin.users.profile_edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function profile_update(Request $request, User $user)
    {
        try {
            $requestData = [
                'nid' => $request->nid,
                'dob' => $request->dob,
                'bkash_no' => $request->bkash_no,
                'bank_name' => $request->bank_name,
                'branch' => $request->branch,
                'account_no' => $request->account_no,
            ];

            if ($request->hasFile('picture')) {
                $requestData['picture'] = $this->uploadImage($request->file('picture'));
            }

            $user->update($requestData);

            return redirect()->route('home')->withMessage('Profile Successfully Updated!');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function uploadImage($image)
    {
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/users'), $imageName);
        return $imageName;
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
        return view('backend.User_Interface.approved.approve', compact('notification'));
    }

    public function approve(Request $request)
    {
        try {
            DB::beginTransaction();

            $child_user = User::where('id', $request->child_id)->first();

            if ($request->type == 'payment') {

                $registerFee = Type::where('name', 'register')->first()->point->point;

                if (Auth::user()->point < $registerFee) {
                    return redirect()->back()->withInput()->withErrors("You don't have enough point.");
                }

                $userPoint = Auth::user()->point - $registerFee;

                Auth::user()->update([
                    'point' => $userPoint
                ]);

                PaymentHistory::create([
                    'user_id' => Auth::id(),
                    'point' => $registerFee,
                    'Details' => $registerFee . ' point successfully paid for ' . $child_user->name . ", id: " . ($child_user->uuid) . 'registration',
                    'type' => PaymentType::PAYMENT(),
                    'payment_id' => $child_user->id
                ]);

                $child_user->update([
                    'is_approved_payment' => 1
                ]);
            }

            $this->createSponsor($request);

            $notification = Notification::where('id', $request->notification_id)->first();
            $notification->update([
                'status' => NotificationStatus::READ()
            ]);
            DB::commit();
            return redirect()->route('home')->withMessage('Successfully approved ' . $request->type);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($e);
        }
    }

    public function autocomplete(Request $request)
    {
        $data = User::select("name")
            ->where("uuid", $request->input('query'))
            ->get();

        return response()->json($data);
    }

    public function search(Request $request)
    {
        $sponsor_id = $request->input('sponsor_id');
        $userName = User::where('uuid', $sponsor_id)->get();
        // $userName = $userName->name;
        return $userName;
    }

    public function createSponsor($request)
    {
        $child_user = User::where('id', $request->child_id)->first();
        $parent_user = User::where('uuid', $child_user->sponsor_id)->first();

        $hand = Hand::create([
            'parent_id' => $parent_user->id,
            'child_id' => $request->child_id
        ]);

        $child_user->update([
            'is_approved_sponsor' => 1
        ]);

        $parent_id = $hand->parent_id;
        $lastParent_id = 0;

        for ($i = 1; $i < 7; $i++) {
            if (!is_null($parent_id) && $parent_id != $lastParent_id) {
                $type = Type::where("name", "level_$i")->first();
                $point = $type->point->point;
            } else {
                break;
            }

            $parentUser = User::find($parent_id);
            $parentUser->point = $parentUser->point + $point;
            $parentUser->update();

            $parentUser->notifications()->create([
                "type" => "level_$i",
                "message" => "$point point for refer a user $parent_id",
                "status" => NotificationStatus::READ()
            ]);

            $parentUser->paymentHistories()->create([
                'details' => "$point point for refer a user $parent_id",
                'point' => $point,
                'payment_id' => $parent_id,
                'type' => PaymentType::SPONSOR()
            ]);

            $hand = Hand::where('child_id', $parent_id)->first();

            if (!is_null($hand)) {
                $lastParent_id = $parent_id;
                $parent_id = $hand->parent_id;
            } else {
                $parent_id = null;
            }
        }
        $child_user->update([
            'is_approve' => 1
        ]);
    }

    public function getpaymentUserName(Request $request)
    {
        $user = User::where('uuid', $request->payment_id)->first();
        return $user->name;
    }

    public function getUserName(Request $request)
    {
        $user = User::where('uuid', $request->sponsor_id)->first();
        return $user->name;
    }

    public function details(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        return view('backend.Admin.users.details', compact('user'));
    }
    
}
