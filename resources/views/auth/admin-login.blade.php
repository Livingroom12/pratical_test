@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <h2>Admin Login</h2>

    <form method="POST" action="{{ url('/admin/login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address">
             @error('email')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
             @error('password')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Login</button>
    </form>
@endsection
