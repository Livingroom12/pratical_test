<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminVerified
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('admin.login')->withErrors(['email' => 'Please login first']);
        }

        if ($user->role !== 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'You are not allowed to access this page']);
        }

        if (!$user->is_verified) {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'Please verify your account first']);
        }

        return $next($request);
    }
}
