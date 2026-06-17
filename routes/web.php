<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController; // ◄ Pastikan ini di-import jika pakai controller
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('dashboard'); // Ganti 'welcome' dengan nama file view beranda kamu
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    // Tambahkan rute lainnya di sini
});
    
    // ◄ BERIKUT ADALAH RUTE DASHBOARD YANG WAJIB ADA:
    Route::get('/dashboard', function () {
        return view('dashboard'); // Membuka file resources/views/dashboard.blade.php
    })->name('dashboard');

// Menampilkan halaman member
Route::get('/member', [MemberController::class, 'index'])->name('member.index');

// Menyimpan data member ke database
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');

// Menghapus member
Route::delete('/member/delete/{id}', [MemberController::class, 'destroy'])->name('member.delete');

// --- FITUR PROFILE USER ---
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::post('/settings/save', [SettingsController::class, 'save'])->name('settings.save');

Route::get('/member/success', function () {
    return view('member.success');
})->name('member.success');

// routes/web.php
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak'); // <--- PENTING: ini yang membuat route('kontak') bekerja

// Tambahkan baris ini di routes/web.php
Route::get('/kelas-glowfit', [GymController::class, 'indexKelas'])->name('kelasglowfit');
Route::post('/api/booking', [GymController::class, 'storeBooking']);

Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');

Route::post('/booking/verify', [BookingController::class, 'verify'])->name('booking.verify');
Route::get('/booking/jadwal/{id}', [BookingController::class, 'showJadwal'])->name('pilih.jadwal');

Route::post('/booking/proses-final', [BookingController::class, 'prosesFinal'])->name('booking.proses_final');
Route::get('/cek-booking', [BookingController::class, 'cekBooking'])->name('cek.booking');

require __DIR__.'/auth.php';