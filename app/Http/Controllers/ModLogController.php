<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModLog;

class ModLogController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données (si nécessaire)
        $validated = $request->validate([
            'mod_name' => 'required|string|max:255',
            'detected_at' => 'required|date',
            'created_at' => 'required|date',
            'updated_at' => 'required|date',
        ]);

        // Insertion dans la base de données
        $modLog = new ModLog();
        $modLog->mod_name = $validated['mod_name'];
        $modLog->detected_at = $validated['detected_at'];
        $modLog->created_at = $validated['created_at'];
        $modLog->updated_at = $validated['updated_at'];
        $modLog->save();

        // Réponse JSON
        return response()->json(['message' => 'Log créé avec succès'], 200);
    }
}
