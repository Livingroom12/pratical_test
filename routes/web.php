<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});


// Register
Route::get('/register/customer', [RegisterController::class, 'showCustomerRegistration'])->name('register.customer');
Route::post('/register/customer', [RegisterController::class, 'registerCustomer']);

Route::get('/register/admin', [RegisterController::class, 'showAdminRegistration'])->name('register.admin');
Route::post('/register/admin', [RegisterController::class, 'registerAdmin']);

// Verification Routes
Route::get('/verify', [VerificationController::class, 'showVerificationForm'])->name('verify.form');
Route::post('/verify', [VerificationController::class, 'verifyCode'])->name('verify.code');

// Admin Login
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::middleware(['auth', 'is_admin_verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
})->name('logout');
