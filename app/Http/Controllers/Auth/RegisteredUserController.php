<?php

namespace App\Http\Controllers\Auth;

use App\Enums\NotificationColor;
use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Http\Controllers\Controller;
use App\Models\Hand;
use App\Models\Notification;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DateTime;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nid' => ['required', 'max:255', 'unique:users,nid'],
            'mobile' => ['required'],
            'dob' => 'required|date|before:-18 years',
            'sponsor_id' => 'required|exists:users,uuid',
            'payment_id' => 'required|exists:users,uuid',
        ],
            [
                'dob.before'=> 'You must be 18 years old or above'
            ]
        );

        $sponsor = User::where('uuid', $request->sponsor_id)->first();
        $payment = User::where('uuid', $request->payment_id)->first();

        $hands = Hand::where('parent_id', $sponsor->id)->count();
        if($hands>10){
            return redirect()->back()->withInput()->withErrors("This user already sponsored 10 people.");
        }

        try{
            $now = new DateTime();
            $year = $now->format("Y");

            $latest_uuid = User::get('uuid')->last();
            $a = str_replace('-', '', $latest_uuid->uuid);
            $b = Str::substr($a, 8);
            $c = (int)$b;
            $d = (string)($c+1);
            $e= sprintf('%08d', $d);
            $f = Str::substr($e, 0, 4).'-'.Str::substr($e, 4);
            $user_id = '0012'.'-'.$year.'-'.$f;
        }
        catch(Exception $e)
        {
            return redirect()->back()->withInput()->withErrors("Oops! Unsuccessful attempt to generate user id!");
        }

        $user = User::create([
            'uuid' => $user_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
            'nid' => $request->nid,
            'dob' => $request->dob,
            'sponsor_id' => $request->sponsor_id,
            'point' => 0,
            'bkash_no' => $request->bkash_no,
            'bank_name' => $request->bank_name,
            'branch' => $request->branch_name,
            'account_no' => $request->account_no,
            'payment_id' => $request->payment_id,
            'role_id' => 2,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        Notification::create([
            'user_id' => $sponsor->id,
            'child_id' => $user->id,
            'type' => NotificationType::SPONSOR(),
            'message' => "Sponsor request from $user->name ",
            'status' => NotificationStatus::UNREAD(),
            'color' => NotificationColor::RED(),
        ]);

        Notification::create([
            'user_id' => $payment->id,
            'child_id' => $user->id,
            'type' => NotificationType::PAYMENT(),
            'message' => "Payment request from $user->name ",
            'status' => NotificationStatus::UNREAD(),
            'color' => NotificationColor::RED(),
        ]);

       // image upload code
        if($request->hasFile('picture'))
        {
            $image = $request->file('picture');
            $name = $user->uuid . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/users');
            $image->move($destinationPath, $name);
            $user->picture = $name;
            $user->update();
        }
        else
        {
            $user->picture = 'default.png';
            $user->update();
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

}
