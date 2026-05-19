<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('saison_calendrier', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('numero_semaine');
            $table->string('titre', 100);
            $table->text('description')->nullable();
            $table->date('date_revelation');
            $table->enum('type_contenu', ['texte', 'photo', 'video', 'lien'])->default('texte');
            $table->text('contenu_texte')->nullable();
            $table->string('contenu_url', 500)->nullable();
            $table->string('contenu_image', 300)->nullable();
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saison_calendrier');
    }
};