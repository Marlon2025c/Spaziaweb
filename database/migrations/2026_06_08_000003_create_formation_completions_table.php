<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('formation_completions')) return;
        Schema::create('formation_completions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('formation_id')->constrained()->onDelete('cascade');
            $table->string('staff_name');
            $table->string('validated_by');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('formation_completions');
    }
};
