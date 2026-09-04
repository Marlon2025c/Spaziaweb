<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormationQuestion extends Model
{
    protected $fillable = ['formation_id', 'question', 'options', 'correct_index', 'explanation', 'ordre'];

    protected $casts = [
        'options' => 'array',
    ];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
