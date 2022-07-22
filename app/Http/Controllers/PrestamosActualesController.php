<?php

namespace App\Http\Controllers;

use App\Models\PrestamosActuales;
use App\Models\Socios;
use Illuminate\Http\Request;

class PrestamosActualesController extends Controller
{
    /* public function __constructor(){
        $this->middleware(JwtAuth::class);
    }*/

    public function getPrestamosActualesByFecha(Request $fechaInicio)
    {
        $querySocioDatosBasicos = PrestamosActuales::where('fechaInicioPrestamo', $fechaInicio->fechaInicio)
            ->first()
            ->getSocios()
            ->first();
        return response()->json([
            'Datos socio' => $querySocioDatosBasicos,
            'Prestamos Actuales' => PrestamosActuales::where('fechaInicioPrestamo', $fechaInicio->fechaInicio)->get()
        ]);
    }

    public function getPrestamosActualesBySocioId($codigoSocio)
    {
        $querySocioDatosBasicos = Socios::find($codigoSocio);
        $queryCintaVigente = PrestamosActuales::where('socio_fk', $codigoSocio)->get();
        $arrayPrestamos = [];
        foreach ($queryCintaVigente as $cintaVigente) {
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
