<section>
    <h5 class="mb-2">Informasi Profil</h5>
    <p class="text-muted small mb-3">Perbarui nama dan alamat email akun Anda.</p>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}" class="d-none">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}" class="needs-validation" novalidate>
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required class="form-control @error('name') is-invalid @enderror">
            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required class="form-control @error('email') is-invalid @enderror">
            @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-2 py-2 px-3 small">
                    Email belum terverifikasi.
                    <button form="send-verification" class="btn btn-link btn-sm p-0 align-baseline">Kirim ulang verifikasi</button>
                </div>
                @if (session('status') === 'verification-link-sent')
                    <div class="text-success small mt-1">Link verifikasi baru telah dikirim.</div>
                @endif
            @endif
        </div>
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success small">Tersimpan.</span>
            @endif
        </div>
    </form>
</section>
