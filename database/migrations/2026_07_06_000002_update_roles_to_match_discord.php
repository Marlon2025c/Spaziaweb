<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('roles')->where('id_role', 5)->update(['name_role' => 'Modo-Test']);

        foreach (['Modérateur', 'Helpeur', 'Builder', 'Animateur'] as $name) {
            if (!DB::table('roles')->where('name_role', $name)->exists()) {
                DB::table('roles')->insert(['name_role' => $name]);
            }
        }
    }

    public function down(): void
    {
        DB::table('roles')->where('id_role', 5)->update(['name_role' => 'Modérateur Test']);
        DB::table('roles')->whereIn('name_role', ['Modérateur', 'Helpeur', 'Builder', 'Animateur'])->delete();
    }
};
