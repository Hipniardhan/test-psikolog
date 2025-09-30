@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">
            <div class="card shadow print-border">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Hasil Tes Kepribadian Big Five</h4>
                    <span class="d-print-none small">ID: #{{ $hasil->id ?? '-' }}</span>
                </div>
                <div class="card-body">
                    @if($hasil)
                        <div class="row mb-3">
                            <div class="col-sm-6 mb-2">
                                <div class="fw-semibold text-muted small">Nama Peserta</div>
                                <div class="fs-5">{{ $hasil->user_name ?? 'Tidak diketahui' }}</div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div class="fw-semibold text-muted small">Tanggal Tes</div>
                                <div>{{ \Carbon\Carbon::parse($hasil->tanggal_tes)->format('d M Y H:i') }}</div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-4">
                            <div class="col-md-6 mb-3">
                                <div class="fw-semibold text-muted small">Total Skor</div>
                                <div class="display-6 fw-bold text-primary">{{ $hasil->total_skor }}</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="fw-semibold text-muted small">Kategori</div>
                                @php
                                    $kategori = $hasil->total_skor < 30 ? 'Rendah' : ($hasil->total_skor <= 70 ? 'Sedang' : 'Tinggi');
                                    $badgeClass = $kategori === 'Rendah' ? 'bg-secondary' : ($kategori === 'Sedang' ? 'bg-info' : 'bg-success');
                                @endphp
                                <span class="badge {{ $badgeClass }} fs-5">{{ $kategori }}</span>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h5 class="fw-semibold">Interpretasi</h5>
                            <p class="lead" style="line-height:1.5;">{{ $hasil->interpretasi }}</p>
                        </div>
                        <div class="alert alert-light border small">
                            <strong>Catatan:</strong> Hasil ini merupakan gambaran umum preferensi kepribadian dan bukan diagnosis klinis.
                        </div>
                        <div class="mt-4 d-print-none">
                            <button class="btn btn-outline-primary" onclick="window.print()">
                                Cetak Hasil
                            </button>
                            <a href="{{ url('/tes/kepribadian/bigfive') }}" class="btn btn-link">Ulangi Tes</a>
                        </div>
                    @else
                        <div class="alert alert-danger mb-0">Data hasil tidak ditemukan atau telah dihapus.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .navbar, .d-print-none { display:none !important; }
    body { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
    .print-border { border:1px solid #000 !important; }
}
</style>
@endsection
