<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Mengalihkan pengguna ke halaman dashboard utama setelah sukses login
        return redirect()->intended(route('dashboard', absolute: false));
    }

/**
     * Menghancurkan sesi otentikasi (Logout).
     */
/**
     * Destroy an authenticated session (Proses Logout Admin).
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Mengarahkan ke Halaman Beranda setelah logout
        return redirect('/'); 
    }
}
