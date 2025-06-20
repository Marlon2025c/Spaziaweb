<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;
    use HasFactory;  // Permet l'utilisation des usines de modèles pour les tests et les données fictives

    // Indique les champs qui peuvent être remplis via le formulaire (évite les attaques par injection)
    protected $fillable = [
        'logo',
        'tag',
        'title',
        'date',
        'lien_pubhtml5'
    ];
}
