<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Contract;
use App\Http\Controllers\Notation;
use App\Http\Controllers\Auth\SteamAuthController;
use App\Http\Controllers\RemoteAppController;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/support', [PostController::class, 'support'])->name('support');

Route::get('/notations', [Notation::class, 'index'])->name('notation_classement');
Route::get('/notations/{id}', [Notation::class, 'show'])->name('show');


Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard')->middleware('auth', 'is_admin:2');
Route::get('/wiki', [PostController::class, 'admin_wiki'])->name('admin_wiki');
Route::get('/journal', [PostController::class, 'admin_wiki'])->name('journal');
Route::get('/qui_sommes_nous', [Contract::class, 'index'])->name('qui_sommes_nous');

Route::get('/launcher', [PostController::class, 'luancherspcraft'])->name('launcher');
Route::get('/telechargement/launcher', [PostController::class, 'download'])->name('telecharger.launcher');


Route::post('/start-notepad', [RemoteAppController::class, 'startApp'])->name('start-notepad');

Route::get('/stop-notepad', [RemoteAppController::class, 'stopApp']);





Route::get('/login', SteamAuthController::class)->name('login');


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');
