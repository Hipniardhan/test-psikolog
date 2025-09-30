<section>
    <h5 class="mb-2 text-danger">Hapus Akun</h5>
    <p class="text-muted small mb-3">Menghapus akun akan menghilangkan seluruh data secara permanen. Pastikan Anda sudah menyimpan data penting.</p>
    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDeleteAccount">Hapus Akun</button>

    <div class="modal fade" id="modalDeleteAccount" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <p class="small mb-3">Apakah Anda yakin ingin menghapus akun? Tindakan ini tidak dapat dibatalkan.</p>
                        <div class="mb-3">
                            <label for="delete_password" class="form-label">Password</label>
                            <input id="delete_password" name="password" type="password" class="form-control @if($errors->userDeletion->get('password')) is-invalid @endif" placeholder="Password" required>
                            @if($errors->userDeletion->get('password'))
                                <div class="invalid-feedback d-block">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
