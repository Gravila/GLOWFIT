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
    public function handle(Request $request, Closure $next)
    {
        // Jika user login DAN role-nya adalah 'admin', izinkan masuk
        if (Auth::check() && Auth::user()->role === 'user') {
            return $next($request); 
        }
    
        // Jika bukan admin, tendang ke dashboard biasa (bukan ke area admin)
        return redirect('/dashboard')->with('error', 'Akses ditolak!');
    }
}
