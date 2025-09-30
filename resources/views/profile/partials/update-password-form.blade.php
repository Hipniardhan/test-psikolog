<section>
    <h5 class="mb-2">Ubah Password</h5>
    <p class="text-muted small mb-3">Gunakan password yang kuat untuk keamanan akun.</p>
    <form method="post" action="{{ route('password.update') }}" novalidate>
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Password Saat Ini</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current-password" class="form-control @error('current_password','updatePassword') is-invalid @enderror">
            @if($errors->updatePassword->get('current_password'))
                <div class="invalid-feedback d-block">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="update_password_password" class="form-label">Password Baru</label>
            <input id="update_password_password" name="password" type="password" autocomplete="new-password" class="form-control @error('password','updatePassword') is-invalid @enderror">
            @if($errors->updatePassword->get('password'))
                <div class="invalid-feedback d-block">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Konfirmasi Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" class="form-control @error('password_confirmation','updatePassword') is-invalid @enderror">
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="invalid-feedback d-block">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
            @if (session('status') === 'password-updated')
                <span class="text-success small">Tersimpan.</span>
            @endif
        </div>
    </form>
</section>
