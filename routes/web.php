<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EverGardenController;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/notations', [\App\Http\Controllers\Notations::class, 'index']);
use App\Models\User;

Route::post('/generate-token', function() {
    $user = User::find(1);  // Assurez-vous d'avoir un utilisateur ou remplacez par un autre utilisateur
    $token = $user->createToken('PythonAppToken')->plainTextToken;

    return response()->json(['token' => $token]);
});
