<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplyThemeSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Logika untuk menerapkan tema bisa ditaruh di sini
        // Untuk saat ini, kita biarkan kosong agar aplikasi bisa berjalan normal
        
        return $next($request);
    }
}