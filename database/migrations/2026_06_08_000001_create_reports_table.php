<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->enum('mode', ['quotidien', 'joueur']);

            // Report quotidien
            $table->date('date')->nullable();
            $table->text('resume')->nullable();
            $table->string('auteur')->nullable();

            // Report joueur
            $table->string('pseudo')->nullable();
            $table->string('steam_id')->nullable();
            $table->string('types')->nullable();   // ex: "conflit,rumeur"
            $table->string('moderateur')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
