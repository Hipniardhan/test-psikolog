@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Hasil Tes</h3>
        <form method="GET" class="d-flex" style="gap:.5rem;">
            <input type="text" name="q" value="{{ $q }}" class="form-control form-control-sm" placeholder="Cari nama/email/interpretasi...">
            <button class="btn btn-sm btn-outline-primary" type="submit">Cari</button>
        </form>
    </div>
    @includeIf('partials.alerts')
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Peserta</th>
                        <th>Email</th>
                        <th>Tanggal Tes</th>
                        <th>Skor</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hasil as $i => $row)
                        <tr>
                            <td>{{ $hasil->firstItem() + $i }}</td>
                            <td>{{ $row->user_name ?? '-' }}</td>
                            <td class="small text-muted">{{ $row->email ?? '-' }}</td>
                            <td>{{ $row->tanggal_tes }}</td>
                            <td>{{ $row->total_skor }}</td>
                            <td class="text-end">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('bigfive.hasil',$row->id) }}">Lihat</a>
                                <form action="{{ route('admin.hasil.destroy', $row->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus hasil ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada data hasil tes.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($hasil->hasPages())
            <div class="card-footer">{{ $hasil->links() }}</div>
        @endif
    </div>
</div>
@endsection
