<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function create()
    {
        return view('auth.signin');
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success', 'Welcome Back');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records'
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
