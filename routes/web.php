<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/notations', [\App\Http\Controllers\Notations::class, 'index']);
Route::get('/{mod}', function ($mod) {
    $filePath = public_path('mods/' . $mod);
    if (File::exists($filePath)) {
        return response()->download($filePath);
    }
    abort(404, 'Fichier introuvable.');
});
