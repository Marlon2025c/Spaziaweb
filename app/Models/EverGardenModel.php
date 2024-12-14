<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EverGardenModel extends Model
{
    use HasFactory;

    protected $table = 'evergarden'; // Nom de la table
    protected $fillable = ['mod_name', 'user_name']; // Colonnes que l'on peut remplir
}
