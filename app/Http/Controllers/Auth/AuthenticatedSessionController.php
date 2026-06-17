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
    // 1. Proses autentikasi bawaan Laravel
        $request->authenticate();

    // 2. Regenerate session untuk keamanan
        $request->session()->regenerate();

// 3. LOGIKA REDIRECT BERDASARKAN ROLE
// Kita cek apakah user yang login punya role 'admin'
    if (Auth::user()->role === 'admin') {
        return redirect()->intended('Admin.dashboardadmin'); // Admin ke dashboard admin
    }

// Jika bukan admin (member/user), arahkan ke dashboard member/beranda
    return redirect()->intended('/dashboard');
    }
    
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        // Mengarahkan ke Halaman Beranda setelah logout
        return redirect('/'); 
    }

}
