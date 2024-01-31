<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon; 
use Mail; 
use Hash;
use DB;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('admin.auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);
  
        $token = Str::random(64);
        $email = $request->email;
        DB::table('password_resets')->insert([
            'email' => $email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        Mail::send('admin.auth.email.forgot-password',
            ['token' => $token, 'email' => $email],
            function($message) use($email){
                $message->to($email);
                $message->subject('Reset Password');
            }
        );
  
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    /**
     * Display the form to reset password.
     *
     * @return \Illuminate\View\View
     */
    public function showResetForm(Request $request, $token) 
    { 
        return view('admin.auth.passwords.reset', ['token' => $token,'email' => $request->email]);
    }

    /**
     * Update the password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $request->validate([
            'password'             =>'required|string|min:6|confirmed',
            'password_confirmation'=>'required'
        ]);
        $updatePassword = DB::table('password_resets')->where([
                'email' => $request->email, 
                'token' => $request->token
            ])->first();
  
        if(!$updatePassword){
            return back()->withInput()->with('error', 'Token is Invalid!');
        }
  
        $user = User::where('email', $request->email)->update(['password' => $request->password]);
 
        DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
        return redirect()->route('admin.login')->with('message', 'Your password has been changed!');
    }
}