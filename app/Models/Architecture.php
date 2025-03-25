<?php
// app/Models/Architecture.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architecture extends Model
{
    use HasFactory;

    protected $table = 'architecture'; // Assure-toi que le nom de la table est correct
    protected $primaryKey = 'id_architecture'; // Assure-toi que la clé primaire est correcte
    public $timestamps = false; // Si tu n'utilises pas de timestamps

    // ... autres propriétés et méthodes ...
}