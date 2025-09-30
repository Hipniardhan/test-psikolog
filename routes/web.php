<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\AdminPesertaController;
use App\Http\Controllers\AdminHasilController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

// Public landing as home page (no auth middleware)
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Optional public contact endpoint
Route::post('/contact', [LandingController::class, 'contactSubmit'])->name('landing.contact.simple');

Route::get('/dashboard', function () {
    $userId = Auth::id();
    $latestHasil = DB::table('kepribadian_hasil')
        ->where('user_id', $userId)
        ->orderByDesc('tanggal_tes')
        ->first();
    return view('dashboard', compact('latestHasil'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Helper redirect after login (Option A - Controller)
Route::get('/home', [HomeController::class, 'redirect'])->name('home');

// Option B - Middleware (alternative):
// Route::get('/home', fn() => null)->middleware(['auth','redirect.by.role']);

// Admin routes
Route::middleware(['auth','cekrole:admin'])->prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', [AdminDashboardController::class,'index'])->name('dashboard');
    Route::resource('soal', SoalController::class)->except(['show']);
    Route::get('peserta', [AdminPesertaController::class,'index'])->name('peserta.index');
    Route::get('peserta/{id}', [AdminPesertaController::class,'show'])->name('peserta.show');
    Route::get('hasil', [AdminHasilController::class,'index'])->name('hasil.index');
    Route::delete('hasil/{id}', [AdminHasilController::class,'destroy'])->name('hasil.destroy');
});

// Test routes for users
Route::middleware(['auth','cekrole:user'])->group(function() {
    Route::prefix('tes')->group(function () {
        Route::prefix('kepribadian')->group(function () {
            Route::get('/', [TesController::class, 'kepribadian']);
            // Named route for Big Five test (used on welcome page)
            Route::get('/bigfive', [TesController::class, 'bigfive'])->name('tes.bigfive');
            // use store alias as per requirement
            Route::post('/bigfive', [TesController::class, 'store'])->name('bigfive.submit');
            Route::get('/mbti', [TesController::class, 'mbti']);
            Route::get('/mmpi', [TesController::class, 'mmpiKepribadian']);
            Route::get('/bigfive/hasil/{id}', function($id) {
                $hasil = DB::table('kepribadian_hasil as h')
                    ->leftJoin('users as u','u.id','=','h.user_id')
                    ->select('h.*','u.name as user_name')
                    ->where('h.id',$id)
                    ->first();
                return view('hasil-kepribadian', compact('hasil'));
            })->name('bigfive.hasil');
        });
        Route::get('/minat-bakat', [TesController::class, 'minatBakat']);
    });
    Route::get('/tes/mmpi', [TesController::class, 'mmpi']);
});
