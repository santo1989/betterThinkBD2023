<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Models\User;
use Faker\Provider\Payment;
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

    public function Withdraw()
    {
        return view('backend.user_interface.points.Withdraw_point');
    }

    public function generate_point()
    {
        return view('backend.Admin.points.Admin_generate_point');
    }
    public function Withdraw_point(Request $request)
    {
        $this->validate($request, [
            'points' => 'required|numeric|min:1',
        ]);
        $user = User::find(Auth::user()->id);
        $user->points = $user->points - $request->Withdraw_point;
        $user-> save();
        return redirect()->back();
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

        Auth::user()->paymentHistories()->create([
            'type' => PaymentType::SENT(),
            'details' => $data['point']." point Sent to ".$user->name,
            'payment_id' => $user->id,
            'point' => $data['point']
        ]);

        $user->paymentHistories()->create([
            'type' => PaymentType::RECEIVED(),
            'details' => $data['point']." point received from ".Auth::user()->name,
            'payment_id' => Auth::id(),
            'point' => $data['point']
        ]);
        return redirect()->back()->withMessage('Successfully sent reward ');
    }

    public function Admin_generate_point(Request $request)
    {
        $this->validate($request, [
            'points' => 'required|numeric|min:1',
        ]);
        $user = User::find(Auth::user()->id);
        $user->points = $user->points + $request->Generate_point;
        $user-> save();
        return redirect()->back();
    }

    public function paymentHistory()
    {
        $histories = Auth::user()->paymentHistories;

        return view('backend.Admin.points.history', compact('histories'));
    }
}
