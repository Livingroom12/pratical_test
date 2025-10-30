@extends('layouts.app')

@section('title', 'Admin Registration')

@section('content')
    <h2>Admin Registration</h2>



    <form method="POST" action="{{ url('/register/admin') }}">
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control"
                   value="{{ old('first_name') }}" placeholder="Enter first name">
            @error('first_name')
               <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control"
                   value="{{ old('last_name') }}" placeholder="Enter last name">
            @error('last_name')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" id="email" name="email" class="form-control"
                   value="{{ old('email') }}" placeholder="Enter email">
            @error('email')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control"
                   placeholder="Enter password">
            @error('password')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   class="form-control" placeholder="Confirm password">

        </div>

        <button type="submit" class="btn btn-primary">Register</button>

        <div class="text-center mt-3">
            <a href="{{ route('admin.login') }}">Already have an account? Login</a>
        </div>
    </form>
@endsection
