@extends('layouts.public')

@section('content')
<div class="container py-5">
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <!-- 1) Hero -->
  <div class="row align-items-center g-4 mb-5 hero-section">
    <div class="col-lg-6">
      <h1 class="display-4 fw-bold mb-3">Sistem Rekam Medis Modern</h1>
      <p class="lead text-muted">Kelola data pasien, kunjungan, resep, dan laporan secara cepat, aman, dan terstruktur.</p>
      <div class="d-flex flex-wrap gap-2 mt-3">
        <a href="{{ route('login') }}" class="btn btn-primary">Masuk Dashboard</a>
        <a href="{{ route('register') }}" class="btn btn-outline-secondary">Daftar Pasien</a>
      </div>
    </div>
    <div class="col-lg-6 text-center">
      <img src="https://illustrations.popsy.co/gray/doctor.svg" class="img-fluid" alt="Illustration">
    </div>
  </div>

  <!-- 2) Fitur -->
  <div class="mb-5">
    <h2 class="h3 fw-semibold mb-3">Fitur Utama</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <div class="mb-3">
              <!-- person-badge icon (inline SVG) -->
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-primary" viewBox="0 0 16 16">
                <path d="M6.5 2a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7"/>
                <path d="M2 13s-1 0-1-1 1-4 5.5-4S12 11 12 12s-1 1-1 1zM13.5 2a.5.5 0 0 1 .5.5V6a2 2 0 1 1-1-1.732V2.5a.5.5 0 0 1 .5-.5"/>
              </svg>
            </div>
            <h5 class="card-title">Registrasi Pasien</h5>
            <p class="card-text text-muted">Pendaftaran pasien cepat dengan data terpusat dan aman.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <div class="mb-3">
              <!-- clipboard2-pulse -->
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-primary" viewBox="0 0 16 16">
                <path d="M10 1.5H6a.5.5 0 0 0-.5.5v1H4a2 2 0 0 0-2 2V13a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1.5V2a.5.5 0 0 0-.5-.5M6 2h4v1H6z"/>
                <path d="M9.293 9.293 8 10.586 6.854 9.44a.5.5 0 0 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l1.646-1.647a.5.5 0 1 0-.707-.708"/>
              </svg>
            </div>
            <h5 class="card-title">Rekam Kunjungan</h5>
            <p class="card-text text-muted">Catat keluhan, diagnosa, tindakan, dan tindak lanjut tiap kunjungan.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <div class="mb-3">
              <!-- prescription -->
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-primary" viewBox="0 0 16 16">
                <path d="M4 1.5A1.5 1.5 0 0 0 2.5 3v10A1.5 1.5 0 0 0 4 14.5h6A1.5 1.5 0 0 0 11.5 13V3A1.5 1.5 0 0 0 10 1.5zM3.5 3A.5.5 0 0 1 4 2.5h6a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H4a.5.5 0 0 1-.5-.5z"/>
                <path d="M6 4.5h4v1H6zm0 2h4v1H6zM6 8.5h3v1H6z"/>
              </svg>
            </div>
            <h5 class="card-title">Resep & Lab</h5>
            <p class="card-text text-muted">Kelola resep obat dan permintaan pemeriksaan laboratorium.</p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <div class="mb-3">
              <!-- file-earmark-pdf -->
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="text-primary" viewBox="0 0 16 16">
                <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5z"/>
                <path d="M9.5 3V0l3.5 3.5H10a.5.5 0 0 1-.5-.5M6 9h1v4H6zm2 0h1.5a1.5 1.5 0 0 1 0 3H8zm1 1H8v1h1z"/>
              </svg>
            </div>
            <h5 class="card-title">Cetak PDF</h5>
            <p class="card-text text-muted">Cetak ringkasan rekam medis dan laporan dalam format PDF.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- 3) Statistik singkat -->
  <div class="mb-5">
    <div class="row g-3 text-center">
      <div class="col-6 col-md-4">
        <div class="p-4 bg-white border rounded shadow-sm h-100">
          <div class="display-6 fw-bold">12.345</div>
          <div class="text-muted">Pasien</div>
        </div>
      </div>
      <div class="col-6 col-md-4">
        <div class="p-4 bg-white border rounded shadow-sm h-100">
          <div class="display-6 fw-bold">1.234</div>
          <div class="text-muted">Kunjungan/bulan</div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="p-4 bg-white border rounded shadow-sm h-100">
          <div class="display-6 fw-bold">27</div>
          <div class="text-muted">Dokter aktif</div>
        </div>
      </div>
    </div>
  </div>

  <!-- 4) Testimoni singkat (opsional) -->
  <div class="mb-5">
    <div class="card border-0 shadow-sm">
      <div class="card-body">
        <figure class="mb-0">
          <blockquote class="blockquote">
            <p class="mb-2">“Sistemnya ringan, memudahkan tim kami mencatat kunjungan dan membuat ringkasan cepat.”</p>
          </blockquote>
          <figcaption class="blockquote-footer mb-0">
            dr. Sinta Pratiwi, <cite title="Source Title">Klinik Sehat Sentosa</cite>
          </figcaption>
        </figure>
      </div>
    </div>
  </div>

  <!-- 5) Form Kontak -->
  <div class="row g-4 align-items-start mb-5">
    <div class="col-lg-7">
      <h3 class="mb-3">Hubungi Kami</h3>
      <form method="POST" action="{{ route('landing.contact.simple') }}" class="row g-3">
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
    <div class="col-lg-5">
      <div class="p-4 bg-white border rounded shadow-sm">
        <h5 class="fw-semibold mb-2">Informasi Kontak</h5>
        <div class="text-muted small">
          <div>Klinik Sehat Sentosa</div>
          <div>Jl. Melati No. 123, Jakarta</div>
          <div>Telp: (021) 123-4567</div>
          <div>Email: info@kliniksehat.id</div>
        </div>
      </div>
    </div>
  </div>

  <!-- 6) Footer mini (di atas footer global layout) -->
  <div class="py-4 border-top">
    <div class="row g-3 align-items-center">
      <div class="col-md-6 small text-muted">
        <strong>Klinik Sehat Sentosa</strong> &middot; Jl. Melati No. 123, Jakarta
      </div>
      <div class="col-md-6 small text-md-end">
        <a href="#" class="text-decoration-none me-3">Kebijakan Privasi</a>
        <a href="#" class="text-decoration-none">Syarat & Ketentuan</a>
      </div>
    </div>
  </div>
</div>
@endsection
