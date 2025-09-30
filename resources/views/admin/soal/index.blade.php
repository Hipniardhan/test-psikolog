@extends('layouts.app')
@section('content')
<div class="container mt-4">
  <div class="d-flex justify-content-between mb-3">
    <h4 class="mb-0">Daftar Soal</h4>
    <a href="{{ route('admin.soal.create') }}" class="btn btn-sm btn-primary">Tambah Soal</a>
  </div>
  @if(session('success'))<div class="alert alert-success py-2">{{ session('success') }}</div>@endif
  @if(session('error'))<div class="alert alert-danger py-2">{{ session('error') }}</div>@endif
  <div class="card shadow-sm">
    <div class="table-responsive">
      <table class="table table-sm table-striped mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Tipe</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($soals as $soal)
            <tr>
              <td>{{ $soal->id }}</td>
              <td><span class="badge bg-secondary">{{ $soal->tipe }}</span></td>
              <td style="max-width:300px">{{ Str::limit($soal->pertanyaan, 80) }}</td>
              <td>{{ DB::table('kepribadian_jawaban')->where('soal_id',$soal->id)->count() }}</td>
              <td>
                <a href="{{ route('admin.soal.edit',$soal->id) }}" class="btn btn-sm btn-outline-warning">Edit</a>
                <form method="POST" action="{{ route('admin.soal.destroy',$soal->id) }}" class="d-inline" onsubmit="return confirm('Hapus soal?')">
                  @csrf @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr><td colspan="5" class="text-center py-4">Belum ada soal.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
    <div class="card-footer py-2">{{ $soals->links() }}</div>
  </div>
</div>
@endsection