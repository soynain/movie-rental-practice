<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=200;$i++){
            DB::table('pelicula')->insert([
                'nombre'=>Str::random(16),
                'genero_fk'=>$i,
                'director_fk'=>$i
            ]);
        }
    }
}
