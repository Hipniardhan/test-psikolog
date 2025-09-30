@extends('layouts.adminlte')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Peserta</h3>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Total Tes</th>
                            <th>Terakhir Tes</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($peserta as $i => $p)
                            <tr>
                                <td>{{ $peserta->firstItem() + $i }}</td>
                                <td>{{ $p->name }}</td>
                                <td class="text-muted small">{{ $p->email }}</td>
                                <td>{{ $p->tes_count }}</td>
                                <td>{{ $p->last_test ?: '-' }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.peserta.show', $p->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">Belum ada peserta.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($peserta->hasPages())
            <div class="card-footer">{{ $peserta->links() }}</div>
        @endif
    </div>
</div>
@endsection
