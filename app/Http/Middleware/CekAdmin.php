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
        // Cek apakah user sudah login dan apakah rolenya admin
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }
    
        return redirect('/')->with('error', 'Anda tidak memiliki akses admin.');
    }
}
