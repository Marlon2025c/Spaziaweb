<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sondage extends Model
{
    protected $fillable = ['titre', 'description', 'statut', 'created_by'];

    public function options()
    {
        return $this->hasMany(SondageOption::class)->orderBy('ordre');
    }

    public function votes()
    {
        return $this->hasMany(SondageVote::class);
    }

    public function createur()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}