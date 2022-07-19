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
        Schema::create('Pelicula',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->id('idPelicula');
            $table->string('nombre',70);
            $table->unsignedBigInteger('genero_fk');
            $table->unsignedBigInteger('director_fk');
            $table->foreign('genero_fk')->references('idGenero')->on('Genero');
            $table->foreign('director_fk')->references('idDirector')->on('Director');
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
