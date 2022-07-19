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
        Schema::create('Socios',function(Blueprint $table){
            $table->engine='InnoDB';
            $table->id('codigoSocio');
            $table->string('nombre',70);
            $table->string('direccion',150);
            $table->string('telefono',11);
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
