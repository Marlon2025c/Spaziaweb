<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommandAdminWiki extends Model
{
    use HasFactory;

    // Si le nom de la table ne suit pas la convention de Laravel
    protected $table = 'admin_commands'; // Remplace par le nom réel de ta table

    // Si tu as des colonnes protégées
    protected $fillable = [
        'command',
        'quick_command',
        'description',
        'group',
    ];
}
