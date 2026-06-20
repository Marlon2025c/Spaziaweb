<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('saison_calendrier', function (Blueprint $table) {
            $table->json('contenu_images')->nullable()->after('contenu_image');
        });
    }

    public function down(): void
    {
        Schema::table('saison_calendrier', function (Blueprint $table) {
            $table->dropColumn('contenu_images');
        });
    }
};
