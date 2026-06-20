<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charte extends Model
{
    protected $fillable = [
        'nom_role', 'emoji', 'couleur',
        'section_role', 'section_responsabilites',
        'section_attentes', 'section_interdictions',
    ];
}
