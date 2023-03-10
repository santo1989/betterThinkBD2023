<?php

namespace App\Http\Controllers;

use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Enums\PaymentType;
use App\Exports\ReferralUserExport;
use App\Models\Hand;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('backend.User_Interface.points.Withdraw_point');
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

        if (Auth::user()->point < $data['point']) {
            return redirect()->back()->withInput()->withErrors("You don't have sufficient point");
        }

        Auth::user()->notifications()->create([
            'type' => NotificationType::WITHDRAW(),
            'message' => $data['point'] . " point requested for withdraw from " . Auth::user()->name .", id: ".(Auth::user()->uuid). " using " . $data['method'],
            'point' => $data['point'],
            'status' => NotificationStatus::UNREAD(),
        ]);

        return redirect()->back()->withMessage($data['point'] . ' point withdraw requested successfully!');
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
            'details' => $data['point'] . " point Sent to " . $user->name.", id: ".($user->uuid),
            'payment_id' => $user->id,
            'point' => $data['point']
        ]);

        $user->paymentHistories()->create([
            'type' => PaymentType::REWARD(),
            'details' => $data['point'] . " point received from " . Auth::user()->name.", id: ".(Auth::user()->uuid),
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
        $user->point = $user->point + $request->Generate_point;
        $user->save();
        Auth::user()->paymentHistories()->create([
            'type' => PaymentType::GENERATE_POINT(),
            'details' => $request->Generate_point . " points generated by " . Auth::user()->name.", id: ".(Auth::user()->uuid),
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

    public function referral()
    {
        $result = [];
        $this->getReferrals(Auth::id(), $result);
        $referredUsers = User::whereIn('id', $result)->get();
//        return $referredUsers;
        return view('backend.User_Interface.history.referral', [
            'referredUsers' => $referredUsers
        ]);
    }

    public function hitTenReferral()
    {
        $referredUsers = Notification::where('type', NotificationType::HITTENREFERRAL())->get();
        return view('backend.User_Interface.history.hit-ten-referral', [
            'referredUsers' => $referredUsers
        ]);
    }

    public function getReferrals($userId, &$result)
    {
        $referrals = Hand::where('parent_id', $userId)->latest()->get();;
        foreach ($referrals as $referral) {
            $result[] = $referral->child_id;
            $this->getReferrals($referral->child_id, $result);
        }
    }

    public function exportReferral()
    {
        return Excel::download(new ReferralUserExport(), 'Referral.xlsx');
    }

}
