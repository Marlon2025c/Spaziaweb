<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormationCompletion extends Model
{
    protected $fillable = ['formation_id', 'staff_name', 'validated_by', 'notes'];

    public function formation()
    {
        return $this->belongsTo(Formation::class);
    }
}
