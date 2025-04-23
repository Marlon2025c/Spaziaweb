<?php

namespace App\Http\Controllers;

use App\Models\Ville;
use App\Models\ParametresClassement;
use App\Models\ConfigClassement;
use Illuminate\Http\Request;

class Notation extends Controller
{ 
    public function index()
    {
        // On récupère le dernier paramètre de classement
        $id_parametre = ConfigClassement::dernierParametre();

        // Vérifier qu'un paramètre de classement existe
        if (!$id_parametre) {
            return redirect()->back()->with('error', 'Aucun paramètre de classement trouvé.');
        }

        // Sélectionner uniquement les villes ayant des notations avec un id_parametre_classement valide
        $villes = Ville::whereHas('notation', function ($query) use ($id_parametre) {
                // On filtre les notations selon l'id_parametre et s'assure que ce paramètre existe dans la table ConfigClassement
                $query->where('id_parametre_classement', $id_parametre)
                    ->whereIn('id_parametre_classement', ConfigClassement::pluck('id_parametre_classement'));
            })
            ->with(['notation' => function ($query) use ($id_parametre) {
                // Filtrage supplémentaire des notations selon l'id_parametre
                $query->where('id_parametre_classement', $id_parametre);
            }])
            ->get();
        // Ajouter les architectures filtrées à chaque ville
        foreach ($villes as $ville) {
            $ville->architectures = $ville->architecturesFiltrees($id_parametre)->get();
            $ville->total_points = $ville->calculerTotalPoints($id_parametre);
            $ville->montant_ville = $ville->calculerMontant($ville->total_points);
        }

                // Trier la collection par total de points de manière décroissante
        $villes = $villes->sortByDesc('total_points')->values();

        // Ajouter le classement directement à la collection $villes
        $villes = $villes->map(function ($ville, $index) {
            $ville->classement = $index + 1;
            return $ville;
        });
        return view('notations/notation_classement', [
            'villes' => $villes,
            'parametres' => ParametresClassement::where('id_parametre_classement', $id_parametre)->first()
        ]);
    }


    

    public function show($id)
    {
        // Charger la ville avec ses notations et les architectures associées
        $ville = Ville::with(['notation.parametreClassement', 'notation.architecture'])->find($id);
    
        if (!$ville) {
            return response()->json(['message' => 'Ville non trouvée'], 404);
        }
    
        // Regrouper les notations par date de semaine PUIS par architecture
        $notations = $ville->notation->groupBy('parametreClassement.date_semaine')
            ->map(function ($group) {
                return $group->groupBy('id_architecture');
            });
    
        return view('notations.ville', [
            'ville' => $ville,
            'notations' => $notations
        ]);
    }
    
}
