<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class ListaRepartooSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=2;$i<=201;$i++){
            $other=$i-1;
            DB::table('listareparto')->insert([
                'actores_fk'=>$other,
                'reparto_fk'=>$i
            ]);
        }
    }
}
