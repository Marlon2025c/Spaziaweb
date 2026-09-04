<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('formations', function (Blueprint $table) {
            if (!Schema::hasColumn('formations', 'points_cles')) {
                $table->text('points_cles')->nullable()->after('description');
            }
            if (!Schema::hasColumn('formations', 'fin_pdf_path')) {
                $table->string('fin_pdf_path')->nullable()->after('pdf_url');
            }
            if (!Schema::hasColumn('formations', 'fin_pdf_url')) {
                $table->string('fin_pdf_url')->nullable()->after('fin_pdf_path');
            }
        });
    }

    public function down(): void
    {
        Schema::table('formations', function (Blueprint $table) {
            $table->dropColumn(['points_cles', 'fin_pdf_path', 'fin_pdf_url']);
        });
    }
};
