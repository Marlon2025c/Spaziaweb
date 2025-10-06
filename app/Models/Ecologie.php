<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecologie extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'ecologie';
    protected $primaryKey = 'id_ecologie';
    protected $fillable = [
        'moulin_a_vent',
        'moulin_a_eau',
        'machine_a_vapeur',
        // toutes tes colonnes
    ];

    public function notations()
    {
        return $this->hasMany(Notation::class, 'id_ecologie', 'id_ecologie');
    }

    protected $colonnes_negatives = ['machine_a_vapeur'];

    public function totalPointsNegatifs()
    {
        return collect($this->toArray())
            ->except(['id_ecologie'])
            ->reduce(function ($carry, $value, $key) {
                if (!is_numeric($value)) return $carry;
                if (in_array($key, $this->colonnes_negatives)) {
                    return $carry - floatval($value); // valeur négative
                }
                return $carry + floatval($value); // valeur positive
            }, 0);
    }
}
