<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JwtAuth;
use App\Models\Socios;
use Illuminate\Http\Request;


class SociosController extends Controller
{
    public function __construct(){
        $this->middleware(JwtAuth::class);
    }

    public function registrarSocio(Request $newSocio){
        $details=Socios::create([
            'nombre'=>$newSocio->nombre,
            'direccion'=>$newSocio->direccion,
            'telefono'=>$newSocio->telefono
        ]);

        return response()->json([
            'Status'=>'Created',
            'Details'=>$details
        ],200);
    }

    public function bajaSocio($codigoSocio){
        $usuarioAEliminar=Socios::find($codigoSocio);
        if($usuarioAEliminar!=null){
            $usuarioAEliminar->delete();
            return response()->json([
                'Status'=>'Deleted'
            ],200);
        }

        return response()->json([
            'Status'=>'Not found',
            'Message'=>'User doesnt exist'
        ],404);
    }
}
