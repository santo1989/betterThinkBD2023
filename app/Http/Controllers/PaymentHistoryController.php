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
}
