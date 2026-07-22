<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SondageOption extends Model
{
    protected $fillable = ['sondage_id', 'label', 'ordre'];

    public function sondage()
    {
        return $this->belongsTo(Sondage::class);
    }

    public function votes()
    {
        return $this->hasMany(SondageVote::class);
    }
}