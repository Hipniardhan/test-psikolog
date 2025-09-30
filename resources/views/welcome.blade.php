@extends('layouts.app')

@section('content')
<div class="py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold mb-3">Selamat Datang</h1>
        <p class="lead text-muted mx-auto" style="max-width: 760px">Platform sederhana untuk Tes Kepribadian Big Five dan (ke depan) MBTI, MMPI, serta Minat & Bakat. Mulai jelajahi dimensi kepribadian Anda.</p>
        <div class="mt-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg me-2">Dashboard</a>
                <a href="{{ route('tes.bigfive') }}" class="btn btn-outline-primary btn-lg me-2">Mulai Tes Big Five</a>
                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-lg">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
                @if(Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>
                @endif
            @endauth
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body py-4">
                    <h5 class="card-title mb-2">Tes Big Five</h5>
                    <p class="card-text small text-muted mb-3">Ukur lima dimensi utama: Openness, Conscientiousness, Extraversion, Agreeableness, Neuroticism.</p>
                    <a href="{{ route('tes.bigfive') }}" class="btn btn-sm btn-primary">Mulai</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body py-4">
                    <h5 class="card-title mb-2">Tes MBTI <span class="badge bg-secondary">Coming Soon</span></h5>
                    <p class="card-text small text-muted mb-3">Segera hadir untuk mengenali preferensi tipe kepribadian Anda.</p>
                    <button class="btn btn-sm btn-outline-secondary" disabled>Segera</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body py-4">
                    <h5 class="card-title mb-2">Tes Lainnya <span class="badge bg-secondary">Coming Soon</span></h5>
                    <p class="card-text small text-muted mb-3">MMPI, Minat & Bakat, dan alat ukur lain akan menambah wawasan Anda.</p>
                    <button class="btn btn-sm btn-outline-secondary" disabled>Segera</button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 text-center small text-muted">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
</div>
@endsection
