<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ListaEsperaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=3;$i<=202;$i++){
            DB::table('listaespera')->insert([
                'socio_fk'=>$i-2,
                'pelicula_fk'=>$i
            ]);
        }
    }
}
