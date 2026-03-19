<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // kalau belum login → biarkan auth middleware yang handle
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // kalau sudah login tapi bukan admin → 403
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
