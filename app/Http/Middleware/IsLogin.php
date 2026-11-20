<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // cek apakah ada session logged_in
        if (! session('logged_in')) {
            // jika tidak ada maka kembali ke login
            return redirect('/')->with('error', 'Silakan login terlebih dahulu!');
        }

        return $next($request);
    }
}
