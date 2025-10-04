<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('wiki_visits', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED
            $table->foreignIdFor(\App\Models\WikiArticle::class) // correspond automatiquement au type de id
                ->nullable()
                ->constrained()
                ->onDelete('cascade');
            $table->date('visited_on'); // juste la date
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wiki_visits');
    }
};
