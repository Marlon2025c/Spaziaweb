<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillesTable extends Migration
{
    public function up()
    {
        Schema::create('villes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('economie');
            $table->integer('gestion');
            $table->integer('metier');
            $table->integer('unseco');
            $table->integer('architecture');
            $table->string('pollution');
        });
    }

    public function down()
    {
        Schema::dropIfExists('villes');
    }
}
