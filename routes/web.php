<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [WebAuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [WebAuthController::class, 'register']);

Route::post('/logout', [WebAuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    // Laporan Routes
    Route::get('/laporan/create', fn() => view('laporan.create'))->name('laporan.create');
    Route::get('/laporan', fn() => view('laporan.index'))->name('laporan.index');
    Route::get('/laporan-publik', fn() => view('laporan.public'))->name('laporan.public');

    // Other Routes
    Route::get('/statistik', fn() => view('statistik'))->name('statistik');
    Route::get('/notifikasi', fn() => view('notifikasi'))->name('notifikasi');

    // Pengaturan Routes
    Route::prefix('pengaturan')->name('pengaturan.')->group(function () {
        Route::get('profil', [\App\Http\Controllers\PengaturanController::class, 'profile'])->name('profile');
        Route::post('profil', [\App\Http\Controllers\PengaturanController::class, 'updateProfile'])->name('profile.update');
        
        Route::get('notifikasi', [\App\Http\Controllers\PengaturanController::class, 'notifikasi'])->name('notifikasi');
        
        Route::get('keamanan', [\App\Http\Controllers\PengaturanController::class, 'keamanan'])->name('keamanan');
        Route::post('keamanan/password', [\App\Http\Controllers\PengaturanController::class, 'updatePassword'])->name('keamanan.password');
        
        Route::get('preferensi', [\App\Http\Controllers\PengaturanController::class, 'preferensi'])->name('preferensi');
        
        Route::get('akun', [\App\Http\Controllers\PengaturanController::class, 'akun'])->name('akun');
    });

    // Verifikasi Laporan Routes
    Route::prefix('verifikasi')->group(function () {
        Route::get('/', [\App\Http\Controllers\VerifikasiLaporanController::class, 'index'])->name('verifikasi.index');
        Route::post('/{id}/verifikasi', [\App\Http\Controllers\VerifikasiLaporanController::class, 'verifikasi'])->name('verifikasi.terima');
        Route::post('/{id}/tolak', [\App\Http\Controllers\VerifikasiLaporanController::class, 'tolak'])->name('verifikasi.tolak');
    });
});
