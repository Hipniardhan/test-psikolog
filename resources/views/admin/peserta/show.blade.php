@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h3 class="mb-0">Detail Peserta</h3>
            <div class="text-muted small">{{ $user->name }} — {{ $user->email }}</div>
        </div>
        <a href="{{ route('admin.peserta.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Tanggal Tes</th>
                            <th>Total Skor</th>
                            <th>Interpretasi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hasil as $i => $h)
                            <tr>
                                <td>{{ $hasil->firstItem() + $i }}</td>
                                <td>{{ $h->tanggal_tes }}</td>
                                <td>{{ $h->total_skor }}</td>
                                <td class="small">{{ Str::limit($h->interpretasi, 80) }}</td>
                                <td class="text-end">
                                    <a href="{{ route('bigfive.hasil', $h->id) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">Belum ada hasil tes untuk peserta ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($hasil->hasPages())
            <div class="card-footer">{{ $hasil->links() }}</div>
        @endif
    </div>
</div>
@endsection
