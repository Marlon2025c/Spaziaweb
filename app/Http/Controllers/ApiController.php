<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        // Récupérer les données envoyées par la requête
        $data = $request->only(['id', 'mod_name', 'detected_at', 'created_at', 'updated_at']);
        
        // Vérifiez que les données existent
        if (empty($data)) {
            return response()->json(['error' => 'Données manquantes'], 400);
        }
        
        // Retourner les données dans le format demandé
        return response()->json([
            'id' => $data['id'],
            'mod_name' => $data['mod_name'],
            'detected_at' => $data['detected_at'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at'],
        ], 200);
    }
}
