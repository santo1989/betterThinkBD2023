<?php

namespace App\Http\Controllers\Admin;

use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Enums\PaymentType;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function request()
    {
        $notification = Notification::where('type', NotificationType::WITHDRAW())->where('status', 'unread')->paginate();

        return view('backend.Admin.points.withdraw-request', compact('notification'));
    }

    public function approvePage(Notification $notification)
    {
        return view('backend.Admin.points.approve', compact('notification'));
    }

    public function approve(Request $notification)
    {
        $notification = Notification::find($notification)->first();
        $requestedUser = User::find($notification->user_id);

        if ($notification->point > $requestedUser->point) {

            $notification->update([
                'status' => NotificationStatus::READ()
            ]);
            return redirect()->route('withdraw.request')->withInput()->withErrors("User don't have sufficient point");
        }

        $requestedUser['point'] -= $notification->point;
        $requestedUser->update();

        $requestedUser->notifications()->create([
            'type' => NotificationType::WITHDRAW(),
            'message' => $notification->point . " point request has been accepted",
            'status' => NotificationStatus::UNREAD(),
            'point' => $notification->point,
        ]);

        $requestedUser->paymentHistories()->create([
            'details' => $notification->point . " point withdraw to admin.",
            'point' => $notification->point,
            'payment_id' => Auth::id(),
            'type' => PaymentType::WITHDRAW()
        ]);

        Auth::user()->point += $notification->point;
        Auth::user()->update();
        $notification->update([
            'status' => NotificationStatus::READ()
        ]);

        return redirect()->route('withdraw.request')->withMessage($notification['point'] . ' point withdraw request accepted!');
    }
}
