<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EverGardenController;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/notations', [\App\Http\Controllers\Notations::class, 'index']);
use App\Http\Controllers\ModLogController;

Route::post('/mod-logs', [ModLogController::class, 'store']);
