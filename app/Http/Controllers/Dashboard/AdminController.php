<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller; // important !
use App\Models\CommandAdminWiki;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Batiment;
class AdminController extends Controller
{

    public function index()
    {
        $adminCommands = CommandAdminWiki::select('command', 'quick_command', 'description', 'group')->get(); // Récupère toutes les lignes de la table
        $adminCommandsAdmin = CommandAdminWiki::getAllCommandsFromBothTables();
        $villes = Ville::select('nom_villes','id_villes')->get();
        return view("admin/admin_dashboard", compact('adminCommands', 'villes', 'adminCommandsAdmin'));
    }
    
    public function joinvilles(Request $request){
        $request->validate([
            'nom_ville' => 'required|string|max:255',
            'nombre_joueur' => 'required|string|max:255',
        ]);

        Ville::create([
            'nom_villes' => $request->nom_ville,
            'nombre_membre' => $request->nombre_joueur,
        ]);
    }

    public function joinmetier(Request $request)
    {
        $request->validate([
            'ville_id'     => 'required|exists:villes,id_villes',
            'date_valide'  => 'required|max:255',
            'pseudo'       => 'required|string|max:255',
            'steam_id'     => 'required|string|max:255',
            'batiment'     => 'required|string|max:255',
            'coordonnes' => 'required|string|max:255',
            'coop'         => 'nullable|string|max:255',
        ]);

        Batiment::create([
            'ville'        => $request->ville_id,
            'date_valide'  => $request->date_valide,
            'pseudo'       => $request->pseudo,
            'steam_id'     => $request->steam_id,
            'batiment'     => $request->batiment,
            'coordonnes'   => $request->coordonnes,
            'coop'         => $request->coop,
        ]);

        return redirect()->back()->with('success', 'Bâtiment ajouté !');
    }
    
    public function startApp()
    {
        $response = Http::post('http://192.168.1.77:5000/start', [
            'app' => 'C:\Users\Marlon\Desktop\Serveur\Saison5\EcoServer.exe'
        ]);
    
        return $response->json(); // parfait
    }
    

    public function stopApp()
    {
        $response = Http::post('http://192.168.1.77:5000/stop', [
            'app' => 'C:\Users\Marlon\Desktop\Serveur\Saison5\EcoServer.exe'
        ]);

        return $response->json();
    }

    public function batiment()
    {
        $villes = Ville::with('batimentMetiers')->get();
        return view('batiments', compact('villes'));
    }
}
