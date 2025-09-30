@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h4 class="mb-3">Forgot Password</h4>
                    <p class="text-muted small">Masukkan email Anda dan kami akan kirimkan link untuk reset password.</p>
                    @if(session('status'))
                        <div class="alert alert-success py-2">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="form-control @error('email') is-invalid @enderror">
                            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Kirim Link Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center small mt-3"><a href="{{ route('login') }}">Kembali ke Login</a></div>
        </div>
    </div>
</div>
@endsection
