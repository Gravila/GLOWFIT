<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use Illuminate\Support\Facades\Route;

// 🔒 GUEST MIDDLEWARE: Hanya bisa diakses sebelum masuk akun
Route::middleware('guest')->group(function () {
    
    // Antarmuka Login & Eksekusi Session Pembuat Cookie
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Pemotongan Jalur Token Bawaan (Bypass Token via Pencocokan Email Langsung ke DB)
    Route::get('forgot-password', [NewPasswordController::class, 'create'])->name('password.request');
    Route::get('reset-password', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

// 🔒 AUTH MIDDLEWARE: Proteksi ketat halaman internal (Tuntutan Skor 5 Aspek Cookies & Session)
Route::middleware('auth')->group(function () {
    
    // Konfirmasi Password Sensitif
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Mengubah Password dari Dalam Profile Dashboard (Menggunakan PasswordController bawaan)
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    // Proses Logout (Menghapus total session & cookies di browser)
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});