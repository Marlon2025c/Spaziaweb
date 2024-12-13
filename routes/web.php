<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EverGardenController;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/notations', [\App\Http\Controllers\Notations::class, 'index']);
Route::post('/EverGarden', [EverGardenController::class, 'store']);
