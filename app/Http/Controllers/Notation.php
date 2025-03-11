<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\ParametresClassement;
use Illuminate\Http\Request;

class Notation extends Controller
{
    public function index()
    {
        $villes = Ville::all();

        // Calculer le total des points pour chaque ville
        foreach ($villes as $ville) {
            $ville->total_points = $ville->economie + $ville->gestion + $ville->metier + $ville->unseco + $ville->architecture + $ville->pollution;
        }

        // Trier les villes par total des points de manière décroissante
        $villes = $villes->sortByDesc('total_points');

        // Réinitialiser les indices pour le classement
        $villes = $villes->values(); // Réindexe les valeurs de la collection

        // Ajouter le classement basé sur l'ordre après tri
        foreach ($villes as $index => $ville) {
            $ville->classement = $index + 1; // Le classement commence à 1
        }

        $parametres = ParametresClassement::orderBy('id', 'desc')->first();

        return view('notations/notation_classement', ['villes' => $villes, 'parametres' => $parametres]);
    }
}
