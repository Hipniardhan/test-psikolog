# Kontribusi Proyek

Terima kasih ingin berkontribusi! Ikuti workflow berikut agar rapi dan aman untuk tim.

## Alur Git (Branching)
- `main`: stabil, selalu bisa di-deploy.
- `develop` (opsional): integrasi fitur sebelum ke `main`.
- Feature branch: `feature/<deskripsi-singkat>`
- Fix branch: `fix/<deskripsi-singkat>`

Langkah standar:
1. Pull terbaru dari `main`.
2. Buat branch baru dari `main`.
3. Commit kecil-kecil dengan pesan jelas (Bahasa Indonesia/Inggris konsisten).
4. Push branch dan buka Pull Request (PR) ke `main`.
5. Minta review 1 rekan.

## Konvensi Kode
- PHP: ikuti PSR-12, gunakan type-hinting bila memungkinkan.
- Blade: gunakan Bootstrap 5, hindari inline style berlebihan.
- Routes: grupkan per role, beri nama route yang konsisten.
- Database: gunakan migration/seed, hindari edit manual.

## Menjalankan Secara Lokal
1. `composer install`
2. Salin `.env` dari `.env.example`, generate key: `php artisan key:generate`
3. Pastikan SQLite aktif; buat file `database/database.sqlite` jika belum ada.
4. `php artisan migrate:fresh --seed`
5. `php artisan serve`

## Testing
- Tambahkan test untuk fitur publik/logic utama.
- Jalankan: `php artisan test`

## PR Checklist
- [ ] Build OK (aplikasi bisa jalan)
- [ ] Tidak ada error PHPStan/Psalm (jika dipakai)
- [ ] Style lulus (PSR-12, php-cs-fixer jika dipakai)
- [ ] Ada test (jika menambah behavior publik)
- [ ] Perubahan UI konsisten dengan Bootstrap

## Rilis
- Gunakan squash merge untuk menjaga riwayat commit bersih.
- Tambahkan catatan perubahan (CHANGELOG) untuk fitur besar.
