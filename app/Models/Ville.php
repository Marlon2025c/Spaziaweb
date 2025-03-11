<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'villes';
    protected $fillable = [
        'nom',
        'economie',
        'gestion',
        'metier',
        'unseco',
        'architecture',
        'pollution',
    ];
}
