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
        Schema::create('PrestamosFinalizados',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('socio_fk');
            $table->unsignedBigInteger('cinta_fk');
            $table->foreign('socio_fk')->references('codigoSocio')->on('Socios');
            $table->foreign('cinta_fk')->references('numeroCinta')->on('Cinta');
            $table->date('fechaFinPrestamo');
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
