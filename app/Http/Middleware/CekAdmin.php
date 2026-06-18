<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
{
    // Jika tidak login, tendang ke halaman login
    if (!Auth::check()) {
        return redirect('/login');
    }

    // Jika sudah login tapi bukan admin, tendang ke dashboard biasa
    if (Auth::user()->role !== 'admin') {
        return redirect('/dashboard')->with('error', 'Anda bukan admin!');
    }

    return $next($request);
}
}
