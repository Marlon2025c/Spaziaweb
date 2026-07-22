<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sondages', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('description')->nullable();
            $table->enum('statut', ['ouvert', 'ferme'])->default('ferme');
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('sondage_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sondage_id')->constrained('sondages')->cascadeOnDelete();
            $table->string('label');
            $table->unsignedInteger('ordre')->default(0);
            $table->timestamps();
        });

        Schema::create('sondage_votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sondage_id')->constrained('sondages')->cascadeOnDelete();
            $table->foreignId('sondage_option_id')->constrained('sondage_options')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['sondage_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sondage_votes');
        Schema::dropIfExists('sondage_options');
        Schema::dropIfExists('sondages');
    }
};