namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModLog; // Assurez-vous d'avoir créé le modèle

class EverGardenController extends Controller
{
    public function store(Request $request)
    {
        // Valider les données JSON
        $data = $request->validate([
            '*.mod_name' => 'required|string',
            '*.detected_at' => 'required|date',
        ]);

        // Sauvegarder chaque entrée dans la base de données
        foreach ($data as $log) {
            ModLog::create([
                'mod_name' => $log['mod_name'],
                'detected_at' => $log['detected_at'],
            ]);
        }

        return response()->json(['message' => 'Logs enregistrés avec succès.'], 201);
    }
}
