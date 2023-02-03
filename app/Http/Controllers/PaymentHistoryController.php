<?php

namespace App\Http\Controllers;

use App\Enums\PaymentType;
use App\Models\PaymentHistory;
use Illuminate\Support\Facades\Auth;

class PaymentHistoryController extends Controller
{
    public function sponsor()
    {
        $sponsors = PaymentHistory::where('user_id', Auth::id())
            ->where('type', PaymentType::SPONSOR())
            ->latest()->paginate();
        return view('backend.User_Interface.history.sponsor', compact('sponsors'));
    }

    public function generatePoint()
    {
        $points = PaymentHistory::where('user_id', Auth::id())
            ->where('type', PaymentType::GENERATE_POINT())
            ->latest()->paginate();
        return view('backend.admin.history.generate-point', compact('points'));
    }
}
