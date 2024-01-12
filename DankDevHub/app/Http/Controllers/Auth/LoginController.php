<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // check email and password
        $credentials = [
            'email' => $request->input('login'),
            'password' => $request->input('password'),
        ];

        // if not email, check with name and password
        if (!Auth::attempt($credentials, $request->filled('remember'))) {
        $credentials = [
            'name' => $request->input('login'),
            'password' => $request->input('password'),
        ];
        
        if (!Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->back()->withInput()->withErrors(['login' => 'Invalid login credentials']);
        }
        else {
            return redirect()->intended('/profile');
        }
        }
        else {
            return redirect()->intended('/');
    }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function requestPassword()
    {
        return view('auth.passwords.request');
    }
}
