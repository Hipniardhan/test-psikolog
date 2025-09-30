## Test Psikolog (Laravel 11)

Aplikasi tes kepribadian Big Five dengan dua peran: Admin dan Peserta (User). Admin mengelola soal/jawaban; Peserta mengerjakan tes dan melihat hasil.

### Fitur
- Auth (Breeze), redirect berdasarkan role
- Role: admin dan user (middleware `cekrole`)
- Admin: CRUD Soal, kelola Peserta dan Hasil (search, hapus)
- User: Kerjakan Tes Big Five (navigasi progresif), lihat hasil terakhir di Dashboard dan halaman detail
- UI: Bootstrap 5 via CDN + Bootstrap Icons

### Akun Demo (setelah seeding)
- Admin: `admin@test.com` / `password`
- User: `user1@test.com` / `password`
- User: `user2@test.com` / `password`

---

## Setup Cepat (Windows PowerShell)
Pastikan PHP 8.2+, Composer, dan (opsional) Node.js terinstal.

```powershell
cd C:\xampp\htdocs\test-psikolog

# 1) Install dependency
composer install

# 2) Salin env & generate key
if (!(Test-Path .env)) { Copy-Item .env.example .env }
php artisan key:generate

# 3) Siapkan SQLite
if (!(Test-Path .\database\database.sqlite)) { New-Item .\database\database.sqlite -ItemType File | Out-Null }

# 4) Migrasi + seed
php artisan migrate:fresh --seed

# 5) Jalankan server
php artisan serve
```

Buka: http://127.0.0.1:8000/

Jika ingin memakai Vite (opsional untuk asset kustom):
```powershell
npm install
npm run dev
```

---

## Alur Navigasi
- Guest → /login
- Setelah login: Admin → /admin/dashboard, User → /dashboard
- Halaman root `/` melakukan redirect sesuai role.

## File Penting
- Routes: `routes/web.php`
- Middleware Role: `app/Http/Middleware/CekRole.php`
- Admin Soal: `app/Http/Controllers/SoalController.php`, Views `resources/views/admin/soal/*`
- Tes Big Five: `app/Http/Controllers/TesController.php`, View `resources/views/tes-kepribadian-bigfive.blade.php`
- Hasil: `resources/views/hasil-kepribadian.blade.php`

## Kontribusi
Lihat CONTRIBUTING.md untuk workflow branch/PR standar tim.
