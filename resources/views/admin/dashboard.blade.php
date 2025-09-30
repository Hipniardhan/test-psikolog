@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Admin Dashboard</h3>
            <div class="d-flex align-items-center gap-2">
                <a href="{{ route('admin.soal.create') }}" class="btn btn-primary">Kelola Soal</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Logout</button>
                </form>
            </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted small mb-2">Big Five</h6>
                    <h2 class="fw-bold mb-0">{{ $summary['bigfive'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted small mb-2">MBTI</h6>
                    <h2 class="fw-bold mb-0">{{ $summary['mbti'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <h6 class="text-uppercase text-muted small mb-2">MMPI</h6>
                    <h2 class="fw-bold mb-0">{{ $summary['mmpi'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title mb-1">Peserta</h5>
                    <p class="text-muted small mb-3">Lihat daftar peserta dan hasil tes mereka.</p>
                    <a href="{{ route('admin.peserta.index') }}" class="btn btn-outline-primary btn-sm">Kelola Peserta</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title mb-1">Hasil Tes</h5>
                    <p class="text-muted small mb-3">Lihat dan kelola hasil tes pengguna.</p>
                    <a href="{{ route('admin.hasil.index') }}" class="btn btn-outline-success btn-sm">Lihat Hasil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection