<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/receive-data', function (Request $request) {
    // Récupérer les données JSON envoyées
    $data = $request->all();

    // Par exemple, les enregistrer dans un fichier ou une base de données
    \Log::info($data);

    // Retourner une réponse JSON
    return response()->json(['status' => 'success', 'message' => 'Données reçues']);
});
