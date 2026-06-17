<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Pemanggilan model terpisah dengan benar
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Menampilkan halaman reset password.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Menangani pembaruan password langsung ke database (Standar Laravel 11).
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi Input Sisi Server sesuai kriteria RTM UAS
        $request->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'email.required' => 'Kolom E-mail wajib diisi.',
            'email.email' => 'Format E-mail tidak valid.',
            'email.exists' => 'E-mail ini tidak terdaftar di sistem kami.',
            'password.required' => 'Kolom Password Baru wajib diisi.',
            'password.min' => 'Password minimal harus terdiri dari 8 karakter.',
            'password.confirmed' => 'Konfirmasi password baru tidak cocok.'
        ]);

        try {
            // 2. Mengambil data user berdasarkan input email
            $user = User::whereEmail($request->email)->first();

            if (!$user) {
                return back()->withInput()->withErrors(['email' => 'Pengguna tidak ditemukan.']);
            }

            // 3. Menyimpan password baru ke model Laravel 11 PHP Attributes
            $user->password = Hash::make($request->password);
            $user->save();

            // 4. Kembali ke login dengan flash session sukses
            return redirect()->route('login')->with('status', 'Password berhasil diperbarui! Silakan log in.');

        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['email' => 'Terjadi kesalahan sistem: ' . $e->getMessage()]);
        }
    }
}