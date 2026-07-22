<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('roles', 'ordre')) {
            Schema::table('roles', function (Blueprint $table) {
                $table->integer('ordre')->default(0)->after('name_role');
            });
        }

        // Du grade le plus bas au plus haut, rôles "hérités" en fin de liste
        $order = [
            'user'        => 1,
            'Helpeur'     => 2,
            'Modo-Test'   => 3,
            'Builder'     => 4,
            'Animateur'   => 5,
            'Modérateur'  => 6,
            'Responsable' => 7,
            'Fondateur'   => 8,
            'Guide'       => 9,
            'Journaliste' => 10,
            'vip'         => 11,
            'Admin'       => 12,
        ];

        foreach ($order as $name => $ordre) {
            DB::table('roles')->where('name_role', $name)->update(['ordre' => $ordre]);
        }
    }

    public function down(): void
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('ordre');
        });
    }
};
