<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Class Admin
 *
 * Middleware ini membatasi akses ke rute tertentu hanya untuk pengguna dengan role 'admin'.
 */
class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        abort(403, 'Unauthorized action.');
    }
}
