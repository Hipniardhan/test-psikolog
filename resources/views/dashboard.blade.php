@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0">Dashboard</h1>
      <div class="d-flex align-items-center gap-2">
        @if(auth()->user()->role==='admin')
          <a href="{{ route('admin.soal.create') }}" class="btn btn-sm btn-primary">Tambah Soal</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
        </form>
      </div>
  </div>

  <div class="row g-4">
    @if(auth()->user()->role==='admin')
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title mb-1">Selamat Datang, Admin</h5>
            <p class="text-muted small mb-3">Anda dapat mengelola soal dan melihat hasil tes pengguna.</p>
            <a href="{{ route('admin.soal.create') }}" class="btn btn-outline-primary btn-sm">Tambah Soal</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title mb-1">Tes Kepribadian</h5>
            <p class="text-muted small mb-3">Lihat hasil atau coba tes untuk verifikasi pengalaman pengguna.</p>
            <a href="{{ url('/tes/kepribadian/bigfive') }}" class="btn btn-outline-success btn-sm">Coba Tes</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title mb-1">Hasil Terakhir</h5>
            <p class="text-muted small mb-3">Tambahkan ringkasan agregat di sini nanti (jumlah soal, hasil terbaru).</p>
            <button class="btn btn-outline-secondary btn-sm" disabled>Coming Soon</button>
          </div>
        </div>
      </div>
    @else
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title mb-1">Halo, {{ auth()->user()->name }}</h5>
            <p class="text-muted small mb-3">Selamat datang kembali. Silakan lanjutkan atau mulai tes kepribadian Big Five.</p>
            <a href="{{ url('/tes/kepribadian/bigfive') }}" class="btn btn-primary btn-sm">Mulai / Lanjut Tes</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm h-100">
          <div class="card-body">
            <h5 class="card-title mb-1">Hasil Tes Terakhir</h5>
            @if(!empty($latestHasil))
              <p class="text-muted small mb-2">Tanggal: {{ \Carbon\Carbon::parse($latestHasil->tanggal_tes)->format('d M Y H:i') }}</p>
              <p class="mb-2"><strong>Skor:</strong> {{ $latestHasil->total_skor }}</p>
              <p class="mb-3"><strong>Interpretasi:</strong> {{ $latestHasil->interpretasi }}</p>
              <a href="{{ route('bigfive.hasil', $latestHasil->id) }}" class="btn btn-outline-primary btn-sm">Lihat Detail</a>
            @else
              <p class="text-muted small mb-3">Setelah Anda menyelesaikan tes, hasil akan tersedia untuk dilihat atau dicetak.</p>
              <button class="btn btn-outline-secondary btn-sm" disabled>Belum Ada</button>
            @endif
          </div>
        </div>
      </div>
    @endif
  </div>
</div>
@endsection
