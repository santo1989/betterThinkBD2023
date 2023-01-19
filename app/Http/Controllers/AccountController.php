<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function reward()
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

    public function Admin_Reward(Request $request)
    {
        $this->validate($request, [
            'points' => 'required|numeric|min:1',
        ]);
        $user = User::find(Auth::user()->id);
        $user->points = $user->points + $request->Admin_Reward;
        $user-> save();
        return redirect()->back();
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
}
