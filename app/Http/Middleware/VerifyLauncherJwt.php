<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\JwtHelper;

class VerifyLauncherJwt
{
    public function handle($request, Closure $next)
    {
        // 1. Vérifie que la requête vient bien du launcher
        $ua = $request->header('User-Agent', '');
        if (!str_starts_with($ua, 'SpaziaCraft-Launcher/')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        // 2. Vérifie la présence du token
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['error' => 'Token manquant'], 401);
        }

        // 3. Vérifie et décode le JWT
        $payload = JwtHelper::verify($token);
        if (!$payload) {
            return response()->json(['error' => 'Token invalide ou expiré'], 401);
        }

        // 4. Passe les infos joueur à la requête
        $request->merge(['player' => $payload]);

        return $next($request);
    }
}
