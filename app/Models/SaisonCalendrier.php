<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaisonCalendrier extends Model
{
    protected $table = 'saison_calendrier';

    protected $fillable = [
        'numero_semaine',
        'titre',
        'description',
        'date_revelation',
        'type_contenu',
        'contenu_texte',
        'contenu_url',
        'contenu_image',
        'actif',
    ];

    protected $casts = [
        'date_revelation' => 'date',
        'actif'           => 'boolean',
    ];

    public function isRevele(): bool
    {
        return $this->actif && $this->date_revelation->isPast();
    }
}