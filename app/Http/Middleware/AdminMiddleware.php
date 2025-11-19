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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        // Pastikan user sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Cek role === 'admin'
        if ($user->role !== 'admin' && $user->role !== 'superadmin' && $user->role !== 'developer') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
