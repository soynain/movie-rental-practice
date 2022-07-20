<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PrestamosFinalizadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=200;$i++){
            
            DB::table('prestamosfinalizados')->insert([
                'socio_fk'=>$i,
                'cinta_fk'=>$i,
                'fechaFinPrestamo'=>date_sub(new DateTime(), date_interval_create_from_date_string($i.' days'))
            ]);
        }
    }
}
