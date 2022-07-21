<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('api');
    }

    public function getMovies()
    {
        if(auth('api')->check()){
            return Pelicula::all();
        }
        return response()->json([
            'Status'=>'Unauthorized'
        ]);
    }

    public function getPeliculaByNombre(Request $titulo)
    {
        if ($titulo !== null) {
            $query = Pelicula::where('nombre', $titulo->titulo)->first();
            return $query!==null?$query:response()->json(['Status'=>'Not movie found'],404);
        }
        return response()->json([
            'Status' => 'Empty',
            'Message' => 'Title is empty'
        ],401);
    }
}
