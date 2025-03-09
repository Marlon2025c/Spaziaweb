<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Contract;
use App\Http\Controllers\Notation;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/support', [PostController::class, 'support'])->name('support');

Route::get('/notations', [Notation::class, 'index'])->name('notation_classement');

Route::get('/admin_wiki', [PostController::class, 'admin_wiki'])->name('admin_wiki');

Route::get('/qui_sommes_nous', [Contract::class, 'index'])->name('qui_sommes_nous');

Route::get('/launcher', [PostController::class, 'luancherspcraft'])->name('launcher');
Route::get('/telechargement/launcher', [PostController::class, 'download'])->name('telecharger.launcher');
