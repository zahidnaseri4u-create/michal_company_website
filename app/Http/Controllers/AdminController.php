<?php

namespace App\Http\Controllers;

use App\Mail\VerificationMailCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function AdminLogin(Request $request){
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            $user = Auth::user();

            $AuthenticationCode = random_int(1000000,999999);

            session(['verification_code'=> $AuthenticationCode,'user_id'=>$user->id]);

            Mail::to($user->email)->send(new VerificationMailCode($AuthenticationCode));

            Auth::logout();

            return redirect()->route('custom.verification.form')->with('status','Verificatoin code sent to your mail');
        }
    }
}
