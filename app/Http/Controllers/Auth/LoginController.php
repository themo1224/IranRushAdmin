<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()  {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        // Validate login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate the admin
        if (Auth::guard('web')->attempt($request->only('email', 'password'), $request->filled('remember'))) {
            return redirect()->route('home')->with('success', 'خوش آمدید!'); // Redirect to admin panel
        }

        // Failed login attempt
        return back()->withErrors(['email' => 'ایمیل یا رمز عبور نادرست است.'])->withInput();
    }

    /**
     * Handle Admin Logout
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'شما با موفقیت خارج شدید.');
    }
}
