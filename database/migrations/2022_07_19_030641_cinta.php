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
        Schema::create('Cinta',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->id('numeroCinta');
            $table->unsignedBigInteger('contenido_fk');
            $table->foreign('contenido_fk')->references('idPelicula')->on('Pelicula');
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
