<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
        'titre', 'description', 'categorie', 'emoji', 'couleur',
        'pdf_path', 'pdf_url', 'ordre',
        'points_cles', 'fin_pdf_path', 'fin_pdf_url',
    ];

    public function completions()
    {
        return $this->hasMany(FormationCompletion::class);
    }

    public function questions()
    {
        return $this->hasMany(FormationQuestion::class)->orderBy('ordre');
    }
}
