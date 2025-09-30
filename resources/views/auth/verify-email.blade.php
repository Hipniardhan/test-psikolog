@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h4 class="mb-3">Verifikasi Email</h4>
                    <p class="text-muted small">Terima kasih sudah mendaftar! Silakan cek email Anda dan klik tautan verifikasi. Jika belum menerima, Anda bisa meminta kirim ulang.</p>
                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success py-2">Link verifikasi baru sudah dikirim ke email Anda.</div>
                    @endif
                    <div class="d-flex justify-content-between mt-3">
                        <form method="POST" action="{{ route('verification.send') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm">Kirim Ulang Email</button>
                        </form>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary btn-sm">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
