<?php

namespace App\Http\Controllers;

use App\Models\PrestamosFinalizados;
use App\Models\Socios;
use Illuminate\Http\Request;

class PrestamosFinalizadosController extends Controller
{
    /*public function __constructor(){
        $this->middleware(JwtAuth::class);
    }*/

    public function getPrestamosFinalizadosByFecha(Request $fechaFin)
    {
        $querySocioDatosBasicos = PrestamosFinalizados::where('fechaFinPrestamo', $fechaFin->fechaFin)
            ->first()
            ->getSocios()
            ->first();

        return response()->json([
            'Datos socio' => $querySocioDatosBasicos,
            'Prestamos Actuales' => PrestamosFinalizados::where('fechaFinPrestamo', $fechaFin->fechaFin)->get()
        ]);
    }

    public function getPrestamosFinalizadosBySocioId($codigoSocio)
    {
        $querySocioDatosBasicos = Socios::find($codigoSocio);
        $queryCintaFinalizado = PrestamosFinalizados::where('socio_fk', $codigoSocio)->get();
        $arrayPrestamos = [];
        foreach ($queryCintaFinalizado as $cintaVigente) {
            array_push(
                $arrayPrestamos,
                array_merge(
                    json_decode($cintaVigente->getCintaRentada()->first()->getContenido()->first(), true),
                    json_decode($cintaVigente->first(), true)
                )
            );
        }
        return response()->json([
            'Datos socio' => $querySocioDatosBasicos,
            'Prestamos Actuales' => $arrayPrestamos
            
        ]);
    }
}
