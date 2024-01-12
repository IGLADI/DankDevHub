<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail (Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
        ]);

        $status = \Password::sendResetLink(
            $request->only('email')
        );

        return $status === \Password::RESET_LINK_SENT
            ? back()->with(['success' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
