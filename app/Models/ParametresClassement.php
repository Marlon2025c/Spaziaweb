<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametresClassement extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'parametre_classement';
    protected $primaryKey = 'id_parametre_classement';

    protected $fillable = [
        'montant_donne',
        'date_semaine',
        'argent_par_joueur',
        'membre_max',
        'lois_max',
    ];
}


