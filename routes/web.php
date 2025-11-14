<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Contract;
use App\Http\Controllers\Notation;
use App\Http\Controllers\Auth\SteamAuthController;
use App\Http\Controllers\WikiController;
use App\Http\Controllers\Dashboard\ArticleController;

use App\Http\Controllers\Dashboard\AdminController;

use App\Http\Controllers\RadioController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/* Spazia Génaral */
Route::get('/', [PostController::class, 'index'])->name('home');
Route::fallback(function() {
   return view('include/comingsoon');
});
Route::get('/support', [PostController::class, 'support'])->name('support');
Route::get('/qui_sommes_nous', [Contract::class, 'index'])->name('qui_sommes_nous');
Route::get('/actualites', [PostController::class, 'actualites'])->name('actualites');

/* Spazia Login*/
Route::get('/login', SteamAuthController::class)->name('login');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

/* Spazia Notation*/
Route::get('/notations', [Notation::class, 'index'])->name('notation_classement');
Route::get('/notations/{id}', [Notation::class, 'show'])->name('show');
Route::get('/batiments', [AdminController::class, 'batiment']);
Route::post('/join-villes', [AdminController::class, 'joinvilles'])->name('join-villes');
Route::post('/join-metier', [AdminController::class, 'joinmetier'])->name('join-metier');

/* Spazia Dashboard */
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard')->middleware('auth', 'is_admin:3,4,5,6,7,8');
Route::get('/dashboardv2', [AdminController::class, 'dashboardv2'])->name('dashboardv2');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

/* SpaziaRadio */
Route::get('/radio-stream', [RadioController::class, 'show'])->name('radio.show');
Route::get('/api/nowplaying-local', [RadioController::class, 'nowPlaying'])->name('nowplaying.local');



Route::get('/radio-proxy', function () {
    header('Content-Type: audio/mpeg');
    set_time_limit(0);
    $stream = fopen("http://192.168.1.12:8000/radio.mp3", 'rb');

    while (!feof($stream)) {
        echo fread($stream, 4096); // lecture petit à petit
        flush();
        ob_flush();
    }

    fclose($stream);
});

/* SpaziaWiki */

// Public
Route::get('/wiki', [WikiController::class, 'wiki'])->name('wiki');
Route::get('/wiki/{slug}', [WikiController::class, 'wiki'])->name('wiki.show');
Route::post('/wiki.store', [WikiController::class, 'store'])->name('wiki.store')->middleware('auth', 'is_admin:3,4,5,6,7,8');

// Formulaire d'édition
Route::get('/wiki/{slug}/edit', [WikiController::class, 'edit'])->name('wiki.edit')->middleware('auth', 'is_admin:3,4,5,6,7,8');

// Mise à jour
Route::put('/wiki/{slug}', [WikiController::class, 'update'])->name('wiki.update')->middleware('auth', 'is_admin:3,4,5,6,7,8');


/* SpaziaMC */

Route::get('/launcher', [PostController::class, 'luancherspcraft'])->name('launcher');
Route::get('/telechargement/launcher', [PostController::class, 'download'])->name('telecharger.launcher');