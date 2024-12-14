<?php

namespace App\Http\Controllers;

use App\Models\EverGarden;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        // Récupérer les données envoyées par la requête
        $data = $request->only(['mod_name', 'user_name']);

        // Vérifiez que les données existent
        if (empty($data['mod_name']) || empty($data['user_name'])) {
            return response()->json(['error' => 'Données manquantes'], 400);
        }

        // Sauvegarder les données dans la base de données
        $everGarden = EverGarden::create([
            'mod_name' => $data['mod_name'],
            'user_name' => $data['user_name'],
        ]);

        // Retourner une réponse JSON
        return response()->json([
            'id' => $everGarden->id,
            'mod_name' => $everGarden->mod_name,
            'user_name' => $everGarden->user_name,
            'created_at' => $everGarden->created_at,
            'updated_at' => $everGarden->updated_at,
        ], 200);
    }
}
