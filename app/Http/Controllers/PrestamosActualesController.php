<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JwtAuth;
use App\Models\PrestamosActuales;
use App\Models\PrestamosFinalizados;
use App\Models\Socios;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrestamosActualesController extends Controller
{
    public function __construct()
    {
        $this->middleware(JwtAuth::class);
    }

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

    public function addNewPrestamo(Request $formNewPrestamo)
    {
        // $date=new DateTime();
        $details = PrestamosActuales::create([
            'socio_fk' => $formNewPrestamo->socioid,
            'cinta_fk' => $formNewPrestamo->cintaid,
            'fechaInicioPrestamo' => date('Ymd')
        ]);

        return response()->json([
            'Status' => 'Success',
            'Details' => $details
        ]);
    }

    public function concluirPrestamo(Request $formBajaPrestamo)
    {
        /*   $details=PrestamosActuales::where('socio_fk',$formBajaPrestamo->socioid)
       ->where(function($q)use ($formBajaPrestamo){
            $q->where('cinta_fk',$formBajaPrestamo->cintaid);
       })->first()->delete();*/
        $details = DB::table('PrestamosActuales')
        ->where('socio_fk', $formBajaPrestamo->socioid)
            ->where(function ($q) use ($formBajaPrestamo) {
                $q->where('cinta_fk', $formBajaPrestamo->cintaid);
            })->delete();
        $prestamoFinalizado = PrestamosFinalizados::create([
            'socio_fk' => $formBajaPrestamo->socioid,
            'cinta_fk' => $formBajaPrestamo->cintaid,
            'fechaFinPrestamo' => date('Ymd')
        ]);

        return response()->json([
            'Status' => 'Success',
            'prestamoFinalizado' => $prestamoFinalizado
        ], 200);
    }
}
