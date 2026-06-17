<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{DashboardController, MemberController, ProfileController, SettingsController, GymController, BookingController, AdminMemberController, JadwalKelasController};
use App\Http\Middleware\CekAdmin;

// --- 1. RUTE PUBLIK (Tanpa Login) ---
Route::get('/', function () { return view('dashboard'); });
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/kontak', function () { return view('kontak'); })->name('kontak');
Route::get('/setting', function () { return view('setting'); })->name('setting');

// Fitur Member (Publik)
Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::post('/member/store', [MemberController::class, 'store'])->name('member.store');
Route::delete('/member/delete/{id}', [MemberController::class, 'destroy'])->name('member.delete');
Route::get('/member/success', function () { return view('member.success'); })->name('member.success');

// Gym & Booking (Publik)
Route::get('/kelas-glowfit', [GymController::class, 'indexKelas'])->name('kelasglowfit');
Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
Route::post('/booking/verify', [BookingController::class, 'verify'])->name('booking.verify');
Route::get('/booking/jadwal/{id}', [BookingController::class, 'showJadwal'])->name('pilih.jadwal');
Route::post('/booking/proses-final', [BookingController::class, 'prosesFinal'])->name('booking.proses_final');
Route::get('/cek-booking', [BookingController::class, 'cekBooking'])->name('cek.booking');

// --- 2. RUTE ADMIN (Hanya Admin) ---
Route::middleware(['auth', CekAdmin::class])->prefix('admin')->group(function () {
    Route::get('/dashboardadmin', [DashboardController::class, 'admin'])->name('admin.dashboard');
    
    // Member Admin
    Route::get('/member', [AdminMemberController::class, 'index'])->name('admin.member.index');
    Route::put('/member/update-status/{id}', [AdminMemberController::class, 'updateStatus'])->name('admin.member.updateStatus');

    // Kelas Admin
    Route::get('/kelas', [JadwalKelasController::class, 'index'])->name('admin.kelas.index');
    Route::get('/kelas/create', [JadwalKelasController::class, 'create'])->name('admin.kelas.create');
    Route::post('/kelas/store', [JadwalKelasController::class, 'store'])->name('admin.kelas.store');
    Route::get('/kelas/{id}/edit', [JadwalKelasController::class, 'edit'])->name('admin.kelas.edit');
    Route::post('/kelas/update/{id}', [JadwalKelasController::class, 'update'])->name('admin.kelas.update');
    Route::delete('/kelas/{id}', [JadwalKelasController::class, 'destroy'])->name('admin.kelas.destroy');
});

require __DIR__.'/auth.php';