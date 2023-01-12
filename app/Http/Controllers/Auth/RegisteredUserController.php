<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try{
            $sponsor_id = User::where('uuid', $request->sponsor_id)->first();
            $payment_id = User::where('uuid', $request->payment_id)->first();
            if(!isset($sponsor_id))
            {
             return redirect()->back()->withInput()->withErrors("Enter a Valid Sponsor Id");
            }
            if(!isset($payment_id))
            {
             return redirect()->back()->withInput()->withErrors("Enter a Valid Payment Id");
            }
        }
        catch(Exception $e){
            return redirect()->back()->withInput()->withErrors($e->getMessage());
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
