@extends('layouts.app')
@section('content')
<div class="d-flex align-items-center justify-content-center vh-100 py-4">
    <div class="w-100" style="max-width:480px;">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h4 class="mb-3 text-center">Login</h4>
                @if (session('status'))
                        <div class="alert alert-info py-2">{{ session('status') }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="small">Forgot password?</a>
                        @endif
                    </div>
                    <button class="btn btn-primary w-100" type="submit">Log in</button>
                </form>
                <div class="mt-3 text-center small">Belum punya akun? <a href="{{ route('register') }}">Register</a></div>
            </div>
        </div>
    </div>
</div>
@endsection
