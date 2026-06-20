<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('chartes')) return;
        Schema::create('chartes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_role');
            $table->string('emoji')->default('📋');
            $table->string('couleur')->default('#f97316');
            $table->text('section_role')->nullable();
            $table->text('section_responsabilites')->nullable();
            $table->text('section_attentes')->nullable();
            $table->text('section_interdictions')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chartes');
    }
};
