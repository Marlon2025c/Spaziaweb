<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();  // Création d'un identifiant unique (clé primaire)
            $table->string('image');  // Champ pour l'image
            $table->string('tag');  // Champ pour le tag
            $table->string('title');  // Champ pour le titre
            $table->date('date');  // Champ pour la date
            $table->text('description');  // Champ pour la description
            $table->timestamps();  // Champs created_at et updated_at (automatiquement gérés par Laravel)
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');  // Pour supprimer la table si besoin
    }
}
