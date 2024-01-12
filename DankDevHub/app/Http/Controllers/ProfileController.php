<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar' => 'nullable|max:2048',
            'birthday' => 'nullable|date',
            'about-me' => 'nullable|string|max:255',
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->about_me = $request->input('about-me');

        
        if ($request->avatar) {
            $avatar = $request->file('avatar');
            $avatarPath = $avatar->store('avatars', 'public');
            $user->avatar = $avatarPath;
        }
        
        if ($user->save()) {
            return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
        }
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user->password = bcrypt($request->input('new_password'));
        $user->save();

        return redirect()->route('profile.index')->with('success', 'Password updated successfully!');
    }

    public function destroy()
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('welcome')->with('success', 'Profile deleted successfully!');
    }

    public function deleteAccount()
    {
        $user = Auth::user();
        return view('profile.delete-account', compact('user'));
    }
        
}
