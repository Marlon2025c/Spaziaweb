<?php

// app/Models/Ville.php
// app/Models/Ville.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'villes';
    protected $primaryKey = 'id_villes';
    protected $fillable = [
        'nom_villes',
        'nombre_membre',
    ];

    public function notation()
    {
        return $this->hasMany(Notation::class, 'id_villes', 'id_villes');
    }

    public function architectures()
    {
        return $this->hasManyThrough(
            Architecture::class,
            Notation::class,
            'id_villes',
            'id_architecture',
            'id_villes',
            'id_architecture'
        );
    }
}

