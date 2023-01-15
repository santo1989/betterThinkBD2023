<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Hand;
use App\Models\Notification;
use App\Models\PaymentHistory;
use App\Models\Type;
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
            'sponsor_id' => 'required|exists:users,uuid',
            'payment_id' => 'required|exists:users,uuid',
        ]);

        $hands = Hand::where('parent_id', $request->id)->count();
        if($hands>10){
            return redirect()->back()->withInput()->withErrors("This user already sponsored 10 people.");
        }

        try{
            $now = new DateTime();
            $year = $now->format("Y");

            $latest_uuid = User::get('uuid')->last();
            // dd($latest_uuid);
            $a = str_replace('-', '', $latest_uuid->uuid);
            // $a = str_replace('-', '', "0012-2023-0000-9999");
            //$a = "0012-2023-0000-0000";
            //  dd($a);
            $b = Str::substr($a, 8);
            //dd($b);
            $c = (int)$b;
            $d = (string)($c+1);
            // dd($d);
            $e= sprintf('%08d', $d);
            //dd($e);
            $f = Str::substr($e, 0, 4).'-'.Str::substr($e, 4);
            // dd($f);
            $user_id = '0012'.'-'.$year.'-'.$f;
            // dd($user_id);
        }
        catch(Exception $e)
        {
            return redirect()->back()->withInput()->withErrors("Oops! Unsuccessful attempt to generate user id!");
        }

//        $payingUser = User::where('uuid', $request->payment_id)->first();
//        $minimumPoint = Type::where('name', 'register')->first()->point->point;
//
//        if($payingUser->point < $minimumPoint){
//            return redirect()->back()->withInput()->withErrors("User don't have enough point.");
//        }


        $user = User::create([
            'uuid' => $user_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'picture' => $this->uploadImage(request()->file('picture')),
            // 'picture' => $this->uploadImage(request()->file('picture')),
            'mobile' => $request->mobile,
            'nid' => $request->nid,
            'dob' => $request->dob,
            'sponsor_id' => $request->sponsor_id,
            'bkash_no' => $request->bkash_no,
            'bank_name' => $request->bank_name,
            'branch' => $request->branch_name,
            'account_no' => $request->account_no,
            'payment_id' => $request->payment_id,
            'role_id' => 2,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

//        // Cut point from payment_id
//        $payingUser['point'] -= $minimumPoint;
//        $payingUser->update();
//        PaymentHistory::create([
//            'user_id' => $payingUser->id,
//            'point' => $minimumPoint,
//            'Details' => 'User Registration'
//        ]);


        $sponser_notification = Notification::create([
            'user_id'=> $user->uuid,
            'name'=> $request->sponsor_id,
            'message'=> 'new payment request from ' . ' '.$user-> name . ' '. 'for' . ' '. $request->payment_id . ' '. 'and sponser is' . ' '. $request->sponsor_id,
            'status'=> 'unread',
            'link'=> route('home'),
            'color'=> 'red',
        ]);
        $sponser_notification->link = $sponser_notification->link . '/notification_id=' . $sponser_notification->id;
        $sponser_notification->update();

        $payment_notification = Notification::create([
            'user_id'=>$user->uuid,
            'name'=>
            $request->payment_id,
            'message'=> 'new payment request from ' . ' '.$user-> name . ' '. 'for' . ' '. $request->payment_id . ' '. 'and sponser is' . ' '. $request->sponsor_id,
            'status'=> 'unread',
            'link'=> route('home'),
            'color'=> 'red',
        ]);
        $payment_notification->link = $payment_notification->link . '/notification_id=' . $payment_notification->id;
        $payment_notification->update();

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
