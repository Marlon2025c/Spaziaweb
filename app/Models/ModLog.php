<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModLog extends Model
{
    use HasFactory;

    protected $table = 'mod_logs';  // Nom de la table

    protected $fillable = [
        'mod_name',
        'detected_at',
        'created_at',
        'updated_at',
    ];
}
