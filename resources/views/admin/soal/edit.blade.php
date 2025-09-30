@extends('layouts.adminlte')
@section('content')
<div class="container mt-4">
  <div class="d-flex justify-content-between mb-3">
    <h4 class="mb-0">Edit Soal #{{ $soal->id }}</h4>
    <a href="{{ route('admin.soal.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
  </div>
  @if($errors->any())
    <div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
  @endif
  @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div>@endif
  <div class="card shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.soal.update',$soal->id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
          <label class="form-label">Kategori / Tipe</label>
          <select name="tipe" class="form-select" required>
            <option value="bigfive" {{ $soal->tipe=='bigfive'?'selected':'' }}>Big Five</option>
            <option value="mbti" {{ $soal->tipe=='mbti'?'selected':'' }}>MBTI</option>
            <option value="mmpi" {{ $soal->tipe=='mmpi'?'selected':'' }}>MMPI</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Pertanyaan</label>
          <textarea name="pertanyaan" class="form-control" rows="3" required>{{ old('pertanyaan',$soal->pertanyaan) }}</textarea>
        </div>
        <hr>
        <h6 class="mb-2">Jawaban</h6>
        <div id="jawaban-wrapper">
          @foreach($jawaban as $i => $j)
            <div class="row g-2 mb-2 jawaban-item">
              <div class="col-md-8">
                <input type="text" name="jawaban[{{$i}}][text]" class="form-control" value="{{ $j->jawaban_text }}" required>
              </div>
              <div class="col-md-3">
                <input type="number" name="jawaban[{{$i}}][bobot]" class="form-control" value="{{ $j->bobot }}" required>
              </div>
            </div>
          @endforeach
          @for($i = count($jawaban); $i < 4; $i++)
            <div class="row g-2 mb-2 jawaban-item">
              <div class="col-md-8">
                <input type="text" name="jawaban[{{$i}}][text]" class="form-control" placeholder="Teks jawaban" >
              </div>
              <div class="col-md-3">
                <input type="number" name="jawaban[{{$i}}][bobot]" class="form-control" placeholder="Bobot" >
              </div>
            </div>
          @endfor
        </div>
        <button class="btn btn-primary mt-3" type="submit">Update</button>
      </form>
    </div>
  </div>
</div>
@endsection