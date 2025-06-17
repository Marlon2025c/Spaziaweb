<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batiment extends Model
{
    public $timestamps = false;
    protected $table = 'batiment_metiers';
    protected $primaryKey = 'id';
    use HasFactory;  // Permet l'utilisation des usines de modèles pour les tests et les données fictives

    // Indique les champs qui peuvent être remplis via le formulaire (évite les attaques par injection)
    protected $fillable = [
        'ville',
        'date_valide',
        'pseudo',
        'steam_id',
        'batiment',
        'coordonnes',
        'coop'
    ];
}
