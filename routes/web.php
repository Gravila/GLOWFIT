<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;


Route::middleware('auth')->group(function () {
    Route::resource('member', MemberController::class);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    // Jalur khusus untuk penanganan Live Search AJAX
    Route::get('/member/search', [MemberController::class, 'search'])->name('member.search');
    Route::resource('member', MemberController::class);
});

Route::post('/session/reset', function() {
    session()->forget(['total_kunjungan', 'kunjungan_pertama', 'kunjungan_terakhir']);
    return redirect()->back()->with('success', 'Hitungan kunjungan berhasil direset!');
})->name('session.reset');

require __DIR__.'/auth.php';
