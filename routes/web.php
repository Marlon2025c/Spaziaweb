<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/support', [PostController::class, 'support'])->name('support');

Route::get('/admin_wiki', [PostController::class, 'admin_wiki'])->name('admin_wiki');
