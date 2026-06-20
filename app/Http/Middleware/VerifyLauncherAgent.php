<?php

namespace App\Http\Middleware;

use Closure;

class VerifyLauncherAgent
{
    public function handle($request, Closure $next)
    {
        $ua = $request->header('User-Agent', '');
        if (!str_starts_with($ua, 'SpaziaCraft-Launcher/')) {
            return response()->json(['error' => 'Forbidden'], 403);
        }
        return $next($request);
    }
}
