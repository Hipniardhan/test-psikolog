@extends('layouts.public')

@section('content')
<div class="container py-5">
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <div class="row align-items-center">
    <div class="col-lg-6">
      <h1 class="display-5 fw-bold mb-3">Selamat datang di Test Psikolog</h1>
      <p class="lead text-muted">Kerjakan tes Big Five dan dapatkan gambaran kepribadianmu dengan cepat.</p>
      @guest
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary">Register</a>
      @else
        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('dashboard') }}" class="btn btn-primary">Buka Dashboard</a>
      @endguest
    </div>
    <div class="col-lg-6 text-center">
      <div class="hero">
        <img src="https://illustrations.popsy.co/gray/goal.svg" class="img-fluid" alt="Illustration">
      </div>
    </div>
  </div>

  <hr class="my-5">

  <div class="row">
    <div class="col-md-8">
      <h3 class="mb-3">Hubungi Kami</h3>
      <form method="POST" action="{{ route('landing.contact') }}" class="row g-3">
        @csrf
        <div class="col-md-6">
          <label class="form-label">Nama</label>
          <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">Email</label>
          <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>
        <div class="col-12">
          <label class="form-label">Pesan</label>
          <textarea name="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
        </div>
        <div class="col-12">
          <button class="btn btn-success" type="submit">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
