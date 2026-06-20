<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('formations')) return;
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->string('categorie')->default('obligatoire');
            $table->string('emoji')->default('📚');
            $table->string('couleur')->default('#f97316');
            $table->string('pdf_path')->nullable();
            $table->string('pdf_url')->nullable();
            $table->integer('ordre')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
