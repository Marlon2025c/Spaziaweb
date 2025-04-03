<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'villes';
    protected $primaryKey = 'id_villes';
    protected $fillable = [
        'nom_villes',
        'nombre_membre',
    ];

    public function notation()
    {
        return $this->hasMany(Notation::class, 'id_villes', 'id_villes');
    }

    public function architecturesFiltrees($id_parametre)
    {
        return $this->hasManyThrough(
            Architecture::class,
            Notation::class,
            'id_villes',        // Clé étrangère sur la table Notation (vers Ville)
            'id_architecture',  // Clé étrangère sur la table Architecture (vers Notation)
            'id_villes',        // Clé locale sur la table Ville
            'id_architecture'   // Clé locale sur la table Notation
        )->where('notation.id_parametre_classement', $id_parametre); // Filtrer sur l'ID du classement
    }

    public function calculerTotalPoints($id_parametre)
    {
        $notation = $this->notation()->where('id_parametre_classement', $id_parametre)->first();
    
        if (!$notation) {
            return null;
        }

        $note_architecture = $this->architectures
            ->groupBy('notation_id') // Regrouper par notation_id pour éviter les doublons
            ->map(function ($group) {
                return $group->sum(function ($architecture) {
                    return array_sum(array_filter(
                        collect($architecture->toArray())
                            ->except(['id_architecture']) // Exclure aussi id_notation
                            ->toArray(),
                        'is_numeric'
                    ));
                });
            })->sum(); // Faire la somme finale de tous les groupes

        return $notation->activite +
            $notation->economie +
            $notation->gestion +
            $notation->metier +
            $notation->unseco +
            $note_architecture -
            $notation->pollution;
    }

    public function calculerMontant($total_points)
    {
        return number_format(($total_points / 100) * 8000, 2, '.', ',');
    }

    public static function withClassement($id_parametre)
    {
        $villes = self::whereHas('notation', function ($query) use ($id_parametre) {
                $query->where('id_parametre_classement', $id_parametre);
            })
            ->whereHas('configClassement', function ($query) use ($id_parametre) {
                $query->where('id_parametre_classement', $id_parametre); // Vérifier que ça existe
            })
            ->with(['notation' => function ($query) use ($id_parametre) {
                $query->where('id_parametre_classement', $id_parametre);
            }, 'architectures'])
            ->get()
            ->map(function ($ville) use ($id_parametre) {
                $ville->total_points = $ville->calculerTotalPoints($id_parametre);
                return $ville;
            })
            ->filter(function ($ville) {
                return $ville->total_points !== null; // Exclure les villes sans notation
            });
    
        foreach ($villes as $ville) {
            $ville->montant_ville = $ville->calculerMontant($ville->total_points);
        }
    
        // Trier les villes par total de points de manière décroissante
        $villes = $villes->sortByDesc('total_points')->values();
    
        // Ajouter le classement
        foreach ($villes as $index => $ville) {
            $ville->classement = $index + 1;
        }
    
        return $villes;
    }
    public function calculerSommeArchitectures()
    {
        return $this->architectures->sum(function ($architecture) {
            return collect($architecture->toArray())
                ->except(['id_architecture', 'id_parametre_classement', 'id_villes','laravel_through_key']) // Exclure les ID
                ->filter(fn($value) => is_numeric($value)) // Garder uniquement les valeurs numériques
                ->sum();
        });
    }
    public function calculerSommeArchitecturesParNotation($id_architecture)
    {
        // Vérifier si les architectures sont présentes et initialisées
        if (is_null($this->architectures) || $this->architectures->isEmpty()) {
            return 0; // Ou tout autre valeur de retour appropriée
        }

        // Les colonnes à inclure
        $colonnes_inclues = [
            'terraforming',
            'coherence_du_style',
            'batiment_metier',
            'coherence_lumieres',
            'presence_de_route',
            'activité_recente',
            'blocs_utilises',
            'habitabilité_des_maisons',
            'batiments_abandonnes',
            'terraforming_realiste',
            'coherence_du_biome',
            'roleplay_de_la_ville',
            'banque',
            'mairie',
            'tribunal',
            'prison',
        ];

        // Filtrer les architectures par l'id donné
        $architectures = $this->architectures->where('id_architecture', $id_architecture);

        // Calculer la somme des valeurs numériques dans chaque architecture en prenant seulement les colonnes incluses
        return $architectures->sum(function ($architecture) use ($colonnes_inclues) {
            // Filtrer les colonnes spécifiques à inclure
            $filtered = collect($architecture->toArray())
                ->only($colonnes_inclues); // Sélectionner uniquement les colonnes autorisées

            // Retourner la somme des valeurs numériques
            return $filtered->filter(fn($value) => is_numeric($value))->sum();
        });
    }
    public function configClassement()
    {
        return $this->belongsTo(ConfigClassement::class, 'id_parametre_classement', 'id_parametre_classement');
    }
}
