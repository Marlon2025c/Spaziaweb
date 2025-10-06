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

        if (!$id_parametre) {
            return redirect()->back()->with('error', 'Aucun paramètre de classement trouvé.');
        }

        $villes = Ville::whereHas('notation', function ($query) use ($id_parametre) {
                $query->where('id_parametre_classement', $id_parametre)
                    ->whereIn('id_parametre_classement', ConfigClassement::pluck('id_parametre_classement'));
            })
            ->with(['notation' => function ($query) use ($id_parametre) {
                $query->where('id_parametre_classement', $id_parametre)
                    ->with('ecologie'); // on charge directement l'écologie
            }])
            ->get();

        foreach ($villes as $ville) {
            $ville->architectures = $ville->architecturesFiltrees($id_parametre)->get();
            $ville->total_points = $ville->calculerTotalPoints($id_parametre);
            $ville->montant_ville = $ville->calculerMontant($ville->total_points);

            // Préparer un objet ecologie prêt à afficher
            $notation = $ville->notation->first(); // on prend la première notation
            if ($notation && $notation->ecologie) {
                $ville->ecologie_detail = $notation->ecologie->toArray();
                $ville->ecologie_total_negatif = $notation->ecologie->totalPointsNegatifs();
            } else {
                $ville->ecologie_detail = [];
                $ville->ecologie_total_negatif = 0;
            }
        }

        // Trier et ajouter le classement
        $villes = $villes->sortByDesc('total_points')->values()
                        ->map(function ($ville, $index) {
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

        // Préparer pour chaque notation le total des architectures
        foreach ($ville->notation as $notation) {
            $notation->total_architecture = $ville->calculerSommeArchitecturesParNotation($notation->id_notation);
        }


        return view('notations.ville', [
            'ville' => $ville,
        ]);
    }

    
}
