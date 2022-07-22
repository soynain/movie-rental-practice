<?php

namespace App\Http\Controllers;

use App\Models\ListaEspera;
use Illuminate\Http\Request;

class ListaEsperaController extends Controller
{
    /* public function __construct()
    {
        $this->middleware(JwtAuth::class);
    }*/

    public function getAllListaEspera(){
        $queryAllListaEspera=ListaEspera::all();
        $movieName=[];
        foreach ($queryAllListaEspera as $movieNames) {
            array_push($movieName,$movieNames->getPeliculaAEsperar()->first());
        }
        return response()->json([
            'ListaEspera'=>$movieName
        ]);
    }

    public function getByPeliculaNombre($codigoSocio){
        $querySocioDatos=ListaEspera::where('socio_fk',$codigoSocio)
        ->first()
        ->getSocio()
        ->first();

        $listaEspera=ListaEspera::where('socio_fk',$codigoSocio)
        ->get();
        $movieName=[];
        foreach ($listaEspera as $movieNames) {
            array_push($movieName,$movieNames->getPeliculaAEsperar()->first());
        }
        return response()->json([
            'SocioDatos'=>$querySocioDatos,
            'ListaEspera'=>$movieName
        ]);
    }
}
