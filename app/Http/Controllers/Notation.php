<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\ParametresClassement;
use Illuminate\Http\Request;

class Notation extends Controller
{
    public function index()
    {
        // Récupérer toutes les villes avec leurs notations et architectures
        $villes = Ville::with(['notation', 'architectures'])->get();

        // Calculer le total des points pour chaque ville
        foreach ($villes as $ville) {
            if ($ville->notation) {
                $note_architecture = 0;
                // Additionner toutes les colonnes numériques de la table 'architectures'
                foreach ($ville->architectures as $architecture) {
                    $note_architecture += array_sum(array_filter($architecture->toArray(), 'is_numeric'));
                }

                // Calculer le total des points
                $ville->total_points = $ville->notation->sum('activite') +
                                        $ville->notation->sum('economie') +
                                        $ville->notation->sum('gestion') +
                                        $ville->notation->sum('metier') +
                                        $ville->notation->sum('unseco') +
                                        $note_architecture - // Soustraire la note de pollution
                                        $ville->notation->sum('pollution');
            } else {
                $ville->total_points = 0;
            }

            // Calculer le montant pour chaque ville (proportionnel à 8000 pour 100 points)
            $montant_ville = ($ville->total_points / 100) * 8000;
            $ville->montant_ville = number_format($montant_ville, 2, '.', ','); // Formater le montant
        }

        // Trier les villes par total de points de manière décroissante
        $villes = $villes->sortByDesc('total_points')->values();

        // Ajouter le classement à chaque ville
        foreach ($villes as $index => $ville) {
            $ville->classement = $index + 1;
        }

        // Récupérer les paramètres du classement (dernier paramètre ajouté)
        $parametres = ParametresClassement::orderBy('id_parametre_classement', 'desc')->first();

        // Retourner la vue avec les villes et les paramètres
        return view('notations/notation_classement', ['villes' => $villes, 'parametres' => $parametres]);
    }
}
