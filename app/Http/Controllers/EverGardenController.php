<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModLog;

class EverGardenController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            '*.mod_name' => 'required|string',
            '*.detected_at' => 'required|date',
        ]);

        foreach ($data as $log) {
            ModLog::create([
                'mod_name' => $log['mod_name'],
                'detected_at' => $log['detected_at'],
            ]);
        }

        return response()->json(['message' => 'Logs enregistrés avec succès.'], 201);
    }
}
?>