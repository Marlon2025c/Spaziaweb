<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\VerifyLauncherJwt;
use App\Http\Middleware\VerifyLauncherAgent;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',       // ← routes API activées
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin'          => AdminMiddleware::class,
            'launcher.jwt'      => VerifyLauncherJwt::class,    // JWT + User-Agent
            'launcher.jwt.agent'=> VerifyLauncherAgent::class,  // User-Agent seulement
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
