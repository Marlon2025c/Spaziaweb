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
     * @param  Request  $request
     * @param  Closure  $next
     * @param  mixed  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            abort(403, 'Accès interdit : Vous devez être connecté.');
        }

        // Convertir les rôles en int (si tu passes des IDs)
        $roles = array_map(fn($r) => (int) $r, $roles);

        if (!Auth::user()->hasRole($roles)) {
            abort(403, 'Accès interdit : Vous n\'avez pas les permissions nécessaires.');
        }

        return $next($request);
    }
}
