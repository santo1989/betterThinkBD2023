<?php

namespace App\Http\Controllers;

use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Enums\PaymentType;
use App\Models\Notification;
use App\Models\User;
use Faker\Provider\Payment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function rewardView()
    {
        $users = User::all();
        return view('backend.Admin.points.Admin_Reward', [
            'users' => $users
        ]);
    }

    public function withdrawView()
    {
        return view('backend.user_interface.points.Withdraw_point');
    }

    public function generate_point()
    {
        return view('backend.Admin.points.Admin_generate_point');
    }
    public function withdraw(Request $request): RedirectResponse
    {
        $data = $this->validate($request, [
            'point' => 'required|numeric|min:1',
            'method' => 'required|string'
        ]);

        if(Auth::user()->point<$data['point']){
            return redirect()->back()->withInput()->withErrors("You don't have sufficient point");
        }

        Auth::user()->notifications()->create([
            'type' => NotificationType::WITHDRAW(),
            'message' => $data['point']." point requested for withdraw from ".Auth::user()->name,
            'point' => $data['point'],
            'status' => NotificationStatus::UNREAD(),
        ]);

        return redirect()->back()->withMessage($data['point'].' point withdraw requested successfully!');
    }

    public function reward(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'integer|exists:users,id',
            'point' => 'required|numeric|min:1',
        ]);

        $user = User::find($data['user_id']);
        $point = $user->point + $data['point'];


        $user->update([
            'point' => $point
        ]);

        $admin = User::find(Auth::user()->role_id == 1);
        $admin->point = $admin->point - $data['point'];
        $admin->save();

        Auth::user()->paymentHistories()->create([
            'type' => PaymentType::REWARD(),
            'details' => $data['point']." point Sent to ".$user->name,
            'payment_id' => $user->id,
            'point' => $data['point']
        ]);

        $user->paymentHistories()->create([
            'type' => PaymentType::REWARD(),
            'details' => $data['point']." point received from ".Auth::user()->name,
            'payment_id' => Auth::id(),
            'point' => $data['point']
        ]);
        return redirect()->route('home')->withMessage('Successfully sent reward ');
    }

    public function Admin_generate_point(Request $request)
    {
        $this->validate($request, [
            'Generate_point' => 'required|numeric|min:1',
        ]);
        $user = User::find(Auth::user()->id);
        // dd($user);
        $user->point = $user->point + $request->Generate_point;
        $user-> save();
        Auth::user()->paymentHistories()->create([
            'type' => PaymentType::RECEIVED(),
            'details' => $request->Generate_point." point generate for ".Auth::user()->name,
            'payment_id' => Auth::id(),
            'point' => $request->Generate_point
        ]);

        return redirect()->route('home')->withMessage('Successfully generated point');
    }

    public function paymentHistory()
    {
        $histories = Auth::user()->paymentHistories;

        return view('backend.Admin.points.history', compact('histories'));
    }
}
