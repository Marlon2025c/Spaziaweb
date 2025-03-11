<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParametresClassement extends Model
{
    use HasFactory;
    protected $table = 'parametre_classement';
    public $timestamps = false;

    protected $fillable = [
        'montant_donne',
        'date_semaine',
        'argent_par_joueur',
        'membre_max',
        'lois_max',
    ];
}
