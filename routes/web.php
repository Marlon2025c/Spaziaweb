<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotationController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/notations', [NotationController::class, 'notations'])->name('notations');
