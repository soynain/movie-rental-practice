<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JwtAuth;
use App\Models\Cinta;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class CintaController extends Controller
{
    public function __construct(){
        $this->middleware(JwtAuth::class);
    }

    public function getCintaByNumero($numeroCinta){
        return Cinta::where('numeroCinta',$numeroCinta)->first();
    }

    public function getCintaWithPelicula($nombrePelicula){
        $cintaAndPelicula=Pelicula::where('nombre',$nombrePelicula)
        ->first();
        return response()->json([
            array_merge(
                json_decode($cintaAndPelicula, true),
                json_decode($cintaAndPelicula->cintaBelongs, true)/*,
                array('genero_nombre'=>$cintaAndPelicula->getGenero->first()->nombre),
                array('director_nombre'=>$cintaAndPelicula->getDirector->first()->nombre)*/
            ),
            
        ]);
    }

  

}
