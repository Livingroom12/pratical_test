@extends('layouts.app')

@section('title', 'Customer Registration')

@section('content')
    <h2>Customer Registration</h2>

    <form method="POST" action="{{ url('/register/customer') }}">
        @csrf

        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" name="first_name" id="first_name"
                   value="{{ old('first_name') }}" placeholder="First Name"
                   class="form-control">
            @error('first_name')
               <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last_name"
                   value="{{ old('last_name') }}" placeholder="Last Name"
                   class="form-control">
            @error('last_name')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" name="email" id="email"
                   value="{{ old('email') }}" placeholder="Enter Email"
                   class="form-control">
            @error('email')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password"
                   class="form-control" placeholder="Enter Password">
            @error('password')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="form-control" placeholder="Confirm Password">
             @error('password_confirmation')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

        <div class="text-center mt-3">
            <a href="{{ route('admin.login') }}">Already have an account? Login</a>
        </div>
    </form>
@endsection
