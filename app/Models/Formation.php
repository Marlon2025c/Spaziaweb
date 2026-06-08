<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'titre', 'description', 'categorie', 'emoji', 'couleur',
        'pdf_path', 'pdf_url', 'ordre',
    ];

    public function completions()
    {
        return $this->hasMany(FormationCompletion::class);
    }
}
