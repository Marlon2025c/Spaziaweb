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

    $architectures = $this->architecturesFiltrees($id_parametre)
        ->where('notation.id_notation', $notation->id_notation)
        ->get();

        $note_architecture_mapped = $architectures->map(function ($architecture) {
            $data = collect($architecture->toArray())
                ->except(['id_architecture', 'laravel_through_key', 'id_notation']);
        
            $sum = 0;
        
            foreach ($data as $key => $value) {
                if (is_numeric(str_replace(',', '.', $value))) {
                    $floatValue = floatval(str_replace(',', '.', $value));
                    // Si c'est "batiments_abandonnes", on le considère comme une pénalité
                    if ($key === 'batiments_abandonnes') {
                        $sum -= $floatValue;
                    } else {
                        $sum += $floatValue;
                    }
                }
            }
        
            return $sum;
        });


    $note_architecture = $note_architecture_mapped->sum();


    $total_points = (float) $notation->activite +
        (float) $notation->economie +
        (float) $notation->gestion +
        (float) $notation->metier +
        (float) $notation->unseco +
        (float) $note_architecture -
        (float) $notation->pollution;


    return $total_points;
}

    public function calculerMontant($total_points)
    {
        return number_format(($total_points / 100) * 5000, 2, '.', ',');
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
        $colonnes_negatives = ['batiments_abandonnes']; // Colonne(s) à considérer comme négative(s)

        return $this->architectures->sum(function ($architecture) use ($colonnes_negatives) {
            return collect($architecture->toArray())
                ->except(['id_architecture', 'id_parametre_classement', 'id_notation', 'id_villes', 'laravel_through_key'])
                ->filter(fn($value) => is_numeric($value)) // On garde que les nombres
                ->reduce(function ($carry, $value, $key) use ($colonnes_negatives) {
                    $floatValue = floatval($value);
                    return $carry + (in_array($key, $colonnes_negatives) ? -$floatValue : $floatValue);
                }, 0);
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
            'presence_lumieres',
            'route_paver',
            'activité_recente',
            'blocs_utilises',
            'habitabilité_des_maisons',
            'batiments_abandonnes',
            'terraforming_realiste',
            'coherence_du_biome',
            'roleplay_de_la_ville',
            'route_en_asphalte',
            'presence_dorganiques',
            'signalisation_routiere',
            'presence_de_mobilier',
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
