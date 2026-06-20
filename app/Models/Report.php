<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'mode',
        'date',
        'resume',
        'auteur',
        'pseudo',
        'steam_id',
        'types',
        'moderateur',
        'description',
        'statut',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function getTypesArrayAttribute(): array
    {
        return $this->types ? explode(',', $this->types) : [];
    }
}
