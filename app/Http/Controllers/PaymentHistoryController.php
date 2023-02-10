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
        return view('backend.Admin.history.generate_point', compact('points'));
    }

    public function withdraw()
    {
        $withdraws = PaymentHistory::where('user_id', Auth::id())
            ->where('type', PaymentType::WITHDRAW())
            ->latest()->paginate();
        return view('backend.User_Interface.history.withdraw', compact('withdraws'));
    }

    public function reward()
    {
        $rewards = PaymentHistory::where('user_id', Auth::id())
            ->where('type', PaymentType::REWARD())
            ->latest()->paginate();
        return view('backend.Admin.history.reward', compact('rewards'));
    }

    public function client_rewards()
    {
        $client_rewards = PaymentHistory::where('user_id', Auth::id())
            ->where('type', PaymentType::REWARD())
            ->latest()->paginate();
        return view('backend.User_Interface.history.client_reward', compact('client_rewards'));
    }
}
