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
        Schema::create('ListaEspera',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('socio_fk');
            $table->unsignedBigInteger('pelicula_fk');
            $table->foreign('socio_fk')->references('codigoSocio')->on('Socios');
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
