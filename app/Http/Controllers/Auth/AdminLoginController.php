<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        if ($user->role !== 'admin') {
            return back()->withErrors(['email' => 'You are not allowed to login from here']);
        }

        if (!$user->is_verified) {
            return back()->withErrors(['email' => 'Please verify your account first']);
        }

        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/admin/dashboard');
        }

        return back()->withErrors(['password' => 'Invalid credentials']);
    }
}
