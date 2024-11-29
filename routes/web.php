<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/notations', [\App\Http\Controllers\Notations::class, 'index']);
