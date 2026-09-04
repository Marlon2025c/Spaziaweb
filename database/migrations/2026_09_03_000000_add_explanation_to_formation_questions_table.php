<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasColumn('formation_questions', 'explanation')) return;
        Schema::table('formation_questions', function (Blueprint $table) {
            $table->text('explanation')->nullable()->after('correct_index');
        });
    }

    public function down(): void
    {
        Schema::table('formation_questions', function (Blueprint $table) {
            $table->dropColumn('explanation');
        });
    }
};
