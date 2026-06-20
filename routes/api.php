<?php

use App\Http\Controllers\LauncherController;
use Illuminate\Support\Facades\Route;

// ─── Routes publiques (avant auth JWT) ────────────────────────────────────
// Seul le User-Agent est vérifié
Route::middleware('launcher.jwt.agent')->group(function () {
    Route::post('/auth/microsoft',    [LauncherController::class, 'authMicrosoft']);
    Route::get('/version/latest',     [LauncherController::class, 'getLatestVersion']);
    Route::get('/update/download',    [LauncherController::class, 'downloadUpdate']);
});

// ─── Routes protégées ──────────────────────────────────────────────────────
// JWT SpaziaCraft + User-Agent obligatoires
Route::middleware('launcher.jwt')->group(function () {
    Route::get('/releases',            [LauncherController::class, 'getReleases']);
    Route::get('/mods',                [LauncherController::class, 'getMods']);
    Route::post('/mods/unauthorized',  [LauncherController::class, 'reportUnauthorizedMod']);
});
