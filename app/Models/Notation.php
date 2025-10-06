<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'notation';

    // Relation avec la table Ville
    public function ville()
    {
        return $this->belongsTo(Ville::class, 'id_villes');
    }

    // Relation avec la table ParametresClassement
    public function parametreClassement()
    {
        return $this->belongsTo(ParametresClassement::class, 'id_parametre_classement');
    }

    // Relation avec la table Architecture
    public function architecture()
    {
        return $this->belongsTo(Architecture::class, 'id_architecture');
    }
    public function ecologie()
    {
        return $this->belongsTo(Ecologie::class, 'id_ecologie');
    }
}

