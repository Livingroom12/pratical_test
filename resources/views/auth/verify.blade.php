@extends('layouts.app')

@section('title', 'Verify Email')

@section('content')
    <h2>Verify Your Email</h2>

    {{-- Display success or error messages --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Display validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('verify.code') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email Address</label>
            <input type="email"
                   class="form-control"
                   name="email"
                   id="email"
                   placeholder="Email"
                   value="{{ old('email', session('email')) }}"
                   >
            @error('email')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Verification Code</label>
            <input type="text"
                   name="code"
                   class="form-control"
                   id="code"
                   placeholder="Verification Code"
                   >
            @error('code')
                <small class="text-danger fw-bold">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Verify</button>
    </form>
@endsection
