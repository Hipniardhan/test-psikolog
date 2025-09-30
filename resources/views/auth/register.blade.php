@extends('layouts.app')
@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 py-4">
    <div class="w-100" style="max-width:560px;">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h4 class="mb-3 text-center">Register</h4>
                <form method="POST" action="{{ route('register') }}" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="form-control @error('name') is-invalid @enderror">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="form-control @error('email') is-invalid @enderror">
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login') }}" class="small">Sudah punya akun?</a>
                        <button type="submit" class="btn btn-success w-100 mt-2">Register</button>
                    </div>
                </form>
                <div class="mt-3 text-center small">Sudah punya akun? <a href="{{ route('login') }}">Login</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
