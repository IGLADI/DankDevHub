<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user == auth()->user()) {
            return redirect('/profile');
        }
        else {
            return view('profile.default', ['user' => $user]);
        }
    }

    public function promoteToAdmin($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->is_admin = true;
        $user->save();

        return redirect()->back()->with('success', 'User promoted to admin successfully!');
    }

    public function demoteFromAdmin($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->is_admin = false;
        $user->save();

        return redirect()->back()->with('success', 'User demoted from admin successfully!');
    }
}
