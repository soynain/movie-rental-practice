<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class SociosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $array=array(0,1,2,3,4,5,6,7,8,9);
    public function run()
    {
        for ($i = 0; $i < 200; $i++) {
            DB::table('socios')->insert([
                'nombre' => Str::random(16),
                'direccion'=>Str::random(16),
                'telefono'=>join("",Arr::random($this->array,9))
            ]);
        }
    }
}
