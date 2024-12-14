<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EverGardenController;
use App\Http\Controllers\NotationController;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/notation', [NotationController::class, 'index']);
use App\Http\Controllers\ApiController;

Route::middleware(['web'])->post('/example', [ApiController::class, 'store']);
