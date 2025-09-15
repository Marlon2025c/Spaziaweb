<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatimentMetier extends Model
{
    protected $table = 'batiment_metiers';

    public function ville()
    {
        return $this->belongsTo(Ville::class, 'ville'); // 'ville' = champ contenant l'ID
    }
}
