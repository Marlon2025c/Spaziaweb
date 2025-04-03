<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigClassement extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'config_classement';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_parametre_classement',
    ];

    public static function dernierParametre()
    {
        return self::orderBy('id', 'desc')->value('id_parametre_classement');
    }
}

