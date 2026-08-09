<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE sondages MODIFY statut ENUM('brouillon', 'ouvert', 'ferme') NOT NULL DEFAULT 'brouillon'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("UPDATE sondages SET statut = 'ferme' WHERE statut = 'brouillon'");
        DB::statement("ALTER TABLE sondages MODIFY statut ENUM('ouvert', 'ferme') NOT NULL DEFAULT 'ferme'");
    }
};
