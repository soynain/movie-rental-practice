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
        Schema::create('RepartoPeliculas',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->id('idReparto');
            $table->unsignedBigInteger('pelicula_fk');
            $table->foreign('pelicula_fk')->references('idPelicula')->on('Pelicula');
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
