<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('role_user')) return;

        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('role_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id_role')->on('roles')->onDelete('cascade');
            $table->unique(['user_id', 'role_id']);
        });

        // Backfill : chaque utilisateur garde son ancien rôle unique dans la table pivot
        $now = now();
        $rows = DB::table('users')->whereNotNull('id_role')->get(['id', 'id_role']);
        foreach ($rows as $row) {
            if (!is_numeric($row->id_role)) continue;
            DB::table('role_user')->insertOrIgnore([
                'user_id'    => $row->id,
                'role_id'    => (int) $row->id_role,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
