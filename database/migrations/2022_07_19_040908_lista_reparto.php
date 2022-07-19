<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ListaReparto',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('actores_fk');
            $table->unsignedBigInteger('reparto_fk');
            $table->foreign('actores_fk')->references('idActor')->on('Actor');
            $table->foreign('reparto_fk')->references('idReparto')->on('RepartoPeliculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
