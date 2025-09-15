<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WikiArticle extends Model
{
    public $timestamps = false; // <--- ajoute ça
    protected $fillable = ['title', 'slug', 'content', 'image'];
}
