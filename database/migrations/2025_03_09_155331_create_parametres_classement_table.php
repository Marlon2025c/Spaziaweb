<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametresClassementTable extends Migration
{
    public function up()
    {
        Schema::create('parametres_classement', function (Blueprint $table) {
            $table->id();
            $table->integer('montant_donne');
            $table->date('date_semaine');
            $table->integer('argent_par_joueur');
            $table->integer('membre_max');
            $table->integer('lois_max');
        });
    }

    public function down()
    {
        Schema::dropIfExists('parametres_classement');
    }
}
