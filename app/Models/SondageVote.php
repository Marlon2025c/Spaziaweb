<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SondageVote extends Model
{
    protected $fillable = ['sondage_id', 'sondage_option_id', 'user_id'];

    public function sondage()
    {
        return $this->belongsTo(Sondage::class);
    }

    public function option()
    {
        return $this->belongsTo(SondageOption::class, 'sondage_option_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}