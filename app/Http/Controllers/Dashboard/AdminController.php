<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\CommandAdminWiki;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
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


    public function batiment()
    {
        $villes = Ville::with('batimentMetiers')->get();
        return view('batiments', compact('villes'));
    }

    public function dashboardv2()
    {
        $content = view('Dashboard/sections/accueil')->render();
        return view('Dashboard/dashboardv2', compact('content'));
    }

    public function loadSection(string $section)
    {
        $allowed = [
            'accueil'     => 'Dashboard/sections/accueil',
            'report_form' => 'Dashboard/sections/report_form',
            'report_list' => 'Dashboard/sections/report_list',
            'formation'   => 'Dashboard/sections/formation',
            'charte'      => 'Dashboard/sections/charte',
            'home'        => 'Dashboard/sections/accueil',
            'users'       => 'Dashboard/prefab',
            'servers'     => 'Dashboard/prefab',
            'stats'       => 'Dashboard/prefab',
        ];

        if (!array_key_exists($section, $allowed)) {
            abort(404);
        }

        if ($section === 'report_list') {
            $reports = Schema::hasTable('reports') ? Report::latest()->get() : collect();
            return view($allowed[$section], compact('reports'))->render();
        }

        return view($allowed[$section])->render();
    }
    public function storeReport(Request $request)
    {
        if (!Schema::hasTable('reports')) {
            return response()->json(['error' => 'Migration non effectuée — lance php artisan migrate'], 503);
        }

        $mode = $request->input('mode');

        if ($mode === 'quotidien') {
            $request->validate([
                'date'        => 'required|date',
                'resume'      => 'required|string|max:5000',
                'auteur'      => 'required|string|max:255',
            ]);
            Report::create([
                'mode'   => 'quotidien',
                'date'   => $request->date,
                'resume' => $request->resume,
                'auteur' => $request->auteur,
            ]);
        } else {
            $request->validate([
                'pseudo'      => 'required|string|max:255',
                'steam_id'    => 'nullable|string|max:50',
                'types'       => 'required|string|max:255',
                'moderateur'  => 'required|string|max:255',
                'description' => 'required|string|max:5000',
            ]);
            Report::create([
                'mode'        => 'joueur',
                'pseudo'      => $request->pseudo,
                'steam_id'    => $request->steam_id,
                'types'       => $request->types,
                'moderateur'  => $request->moderateur,
                'description' => $request->description,
            ]);
        }

        return response()->json(['success' => true]);
    }

    public function notationform()
    {
        return view('Dashboard/notationform');
    }
}
