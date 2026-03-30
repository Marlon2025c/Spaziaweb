<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller; // important !
use App\Models\CommandAdminWiki;
use Illuminate\Support\Facades\Http;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // 👉 Page d'accueil préfabriquée (vue Blade)
        $content = view('Dashboard/prefab')->render();

        // Case AJAX : renvoyer uniquement le contenu
        if ($request->ajax()) {
            return view('dashboard._content', [
                'content' => $content
            ]);
        }
        // Affichage complet
        return view('Dashboard/dashboardv2', [
            'content' => $content
        ]);
    }

    public function loadSection(Request $request, $section)
    {
        // 👉 Exemple : charger du contenu BDD plus tard
        // Pour l'instant on renvoie juste un message
        $content = "<h2>Section : $section</h2><p>Contenu chargé dynamiquement.</p>";

        return view('dashboard._content', [
            'content' => $content
        ]);
    }
}
