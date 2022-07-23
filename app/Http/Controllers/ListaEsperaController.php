<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerificarListaEsperaMiddleware;
use App\Models\ListaEspera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ListaEsperaController extends Controller
{
    /*  public function __construct(){
      //  $this->middleware(JwtAuth::class);
      $this->middleware(VerificarListaEsperaMiddleware::class)->only('addEsperaCliente');
    } */

    public function getAllListaEspera()
    {
        $queryAllListaEspera = ListaEspera::all();
        $movieName = [];
        foreach ($queryAllListaEspera as $movieNames) {
            array_push($movieName, $movieNames->getPeliculaAEsperar()->first());
        }
        return response()->json([
            'ListaEspera' => $movieName
        ]);
    }

    public function getByPeliculaNombre($codigoSocio)
    {
        $querySocioDatos = ListaEspera::where('socio_fk', $codigoSocio)
            ->first()
            ->getSocio()
            ->first();

        $listaEspera = ListaEspera::where('socio_fk', $codigoSocio)
            ->get();
        $movieName = [];
        foreach ($listaEspera as $movieNames) {
            array_push($movieName, $movieNames->getPeliculaAEsperar()->first());
        }
        return response()->json([
            'SocioDatos' => $querySocioDatos,
            'ListaEspera' => $movieName
        ]);
    }

    public function addEsperaCliente(Request $formEspera)
    {
        $details = ListaEspera::create([
            'socio_fk' => $formEspera->socioid,
            'pelicula_fk' => $formEspera->peliculaid
        ]);

        return response()->json([
            'Status' => 'created',
            'Details' => $details
        ], 200);
    }

    public function dropEsperaCliente($codigoSocio, $peliculaFk)
    {
        $removeEspera = DB::table('listaespera')
            ->where('socio_fk', $codigoSocio)
            ->where(function ($q) use ($peliculaFk) {
                $q->where('pelicula_fk', $peliculaFk);
            })->delete();
        if ($removeEspera == 1) {
            return response()->json([
                'Status' => 'Removed from waiting list'
            ], 200);
        }
        return response()->json([
            'Status' => 'Not found on waiting list'
        ], 404);
    }
}
