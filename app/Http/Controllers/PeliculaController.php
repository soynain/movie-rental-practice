<?php

namespace App\Http\Controllers;

use App\Http\Middleware\JwtAuth;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function __construct()
    {
        $this->middleware(JwtAuth::class);
    }

    public function getMovies()
    {
       
        return Pelicula::all();
        
    }

    public function getPeliculaByNombre($titulo)
    {
        if ($titulo !== null) {
            $query = Pelicula::where('nombre', $titulo)->first();
            return $query!==null?$query:response()->json(['Status'=>'Not movie found'],404);
        }
        return response()->json([
            'Status' => 'Empty',
            'Message' => 'Title is empty'
        ],401);
    }

    public function addPelicula(Request $formPelicula){
        $status=Pelicula::create([
            'nombre'=>$formPelicula->nombre,
            'genero_fk'=>$formPelicula->genero,
            'director_fk'=>$formPelicula->director
        ]);
        return response()->json([
            'Status'=>'success',
            'Details'=>$status
        ],200);
    }
}
