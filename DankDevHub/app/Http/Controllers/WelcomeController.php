<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->intended('/profile');
        } else {
            return redirect()->intended('/login');
        }
    }
}
