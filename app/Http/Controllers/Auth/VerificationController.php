<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.verify');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code'  => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found']);
        }

        if ($user->verification_code == $request->code) {
            $user->is_verified = true;
            $user->verification_code = null;
            $user->save();

            return redirect()->route('admin.login')->with('success', 'Your account has been verified.');
        }

        return back()->withErrors(['code' => 'Invalid verification code']);
    }
}
