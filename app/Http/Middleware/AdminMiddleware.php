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
    public function handle(Request $request, Closure $next, string $role)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            abort(403, 'Accès interdit : Vous devez être connecté.');
        }

        // Vérifier si l'utilisateur a le bon rôle
        if (Auth::user()->role !== $role) {
            abort(403, 'Accès interdit : Vous n\'avez pas les permissions nécessaires.');
        }

        return $next($request);
    }
}
