<?php

use App\Models\ListaEspera;
use App\Models\Socios;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   /* $pruebaJoin = ListaEspera::select('*')
    ->join('socios','ListaEspera.socio_fk','Socios.codigoSocio')
    ->get();*/
    //the commented line works but im not interested in that approach
    $pruebaJoin=Socios::find(1)->getListaEspera()
    ->where('socio_fk',1)->get();
    return response()->json([
        'result' => $pruebaJoin
    ]);
});
