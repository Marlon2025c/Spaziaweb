<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Architecture extends Model
{
    use HasFactory;

    protected $table = 'architecture';
    protected $primaryKey = 'id_architecture';
    public $timestamps = false;

    public function notation(): HasMany
    {
        return $this->hasMany(Notation::class, 'id_architecture', 'id_architecture');
    }
}
