<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('web.auth.login');
    }

    /**
     * Validate the request and Log in the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'name'          => ['required'],
            'email'         => ['required', 'email'],
            'phone_number'  => ['required']
        ]);

        $user = User::firstOrCreate(
            ['phone_number' => $request->phone_number], 
            ['name' => $request->name, 'email' => $request->email]
        );
        Auth::login($user, true);
        return redirect()->route('product.index');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('web.showLoginForm');
    }
}
