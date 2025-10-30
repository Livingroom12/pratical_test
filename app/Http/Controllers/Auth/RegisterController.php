<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyMail;

class RegisterController extends Controller
{
    public function showCustomerRegistration()
    {
        return view('auth.register-customer');
    }

    public function showAdminRegistration()
    {
        return view('auth.register-admin');
    }

    public function registerCustomer(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6|confirmed',
        ]);

        $verification_code = rand(100000, 999999);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'customer',
            'verification_code' => $verification_code,
        ]);

        Mail::to($user->email)->send(new VerifyMail($verification_code));

        return redirect()->route('verify.form')->with('email', $user->email);
    }

    public function registerAdmin(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6|confirmed',
        ]);

        $verification_code = rand(100000, 999999);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => 'admin',
            'verification_code' => $verification_code,
        ]);

        Mail::to($user->email)->send(new VerifyMail($verification_code));

        return redirect()->route('verify.form')->with('email', $user->email);
    }
}
