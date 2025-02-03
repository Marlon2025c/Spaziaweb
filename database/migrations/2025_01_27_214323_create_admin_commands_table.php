<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminCommandsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('admin_commands', function (Blueprint $table) {
            $table->id(); // Colonne auto-incrémentée pour l'identifiant
            $table->string('command'); // Commande principale
            $table->string('quick_command')->nullable(); // Commande rapide (optionnelle)
            $table->string('group');
            $table->text('description'); // Description de la commande
            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CreateAdminCommandsTable');
    }
};
