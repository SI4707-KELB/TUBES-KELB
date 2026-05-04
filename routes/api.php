<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index']);

// Verifikasi Laporan Routes
Route::prefix('verifikasi')->group(function () {
    Route::get('/', [\App\Http\Controllers\VerifikasiLaporanController::class, 'index']);
    Route::post('/{id}/verifikasi', [\App\Http\Controllers\VerifikasiLaporanController::class, 'verifikasi']);
    Route::post('/{id}/tolak', [\App\Http\Controllers\VerifikasiLaporanController::class, 'tolak']);
});
