<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
   public function handle(Request $request, Closure $next): \Symfony\Component\HttpFoundation\Response
{
    // Cek apakah sudah login DAN rolenya adalah 'admin'
    if (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->role === 'admin') {
        return $next($request);
    }

    // Jika nakal (belum login), tendang balik ke halaman login
    return redirect()->route('login')->withErrors(['email' => 'Silahkan login terlebih dahulu untuk mengakses halaman admin.']);
}
}
