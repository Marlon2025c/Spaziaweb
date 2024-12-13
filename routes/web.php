<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EverGardenController;

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/notations', [\App\Http\Controllers\Notations::class, 'index']);
use App\Models\User;
use Illuminate\Http\Request;

Route::post('/generate-token', function(Request $request) {
    // Cibler l'utilisateur via son ID ou email
    $user = User::where('email', 'pythonappuser@example.com')->first();  // Remplacez par l'email de l'utilisateur ou l'ID

    if ($user) {
        // Générer un token API pour l'utilisateur
        $token = $user->createToken('PythonAppToken')->plainTextToken;
        return response()->json(['token' => $token]);
    }

    return response()->json(['error' => 'Utilisateur non trouvé'], 404);
});

