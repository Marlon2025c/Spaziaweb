<?php

namespace App\Http\Controllers;

use App\Models\EverGarden;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function store(Request $request)
    {
        // Récupérer et valider les données
        $request->validate([
            'mod_name' => 'required|string',
            'user_name' => 'required|string',
        ]);

        // Sauvegarder les données
        $everGarden = EverGarden::create($request->only(['mod_name', 'user_name']));

        // Retourner la réponse JSON
        return response()->json([
            'id' => $everGarden->id,
            'mod_name' => $everGarden->mod_name,
            'user_name' => $everGarden->user_name,
            'created_at' => $everGarden->created_at,
            'updated_at' => $everGarden->updated_at,
        ], 200);
    }
}
