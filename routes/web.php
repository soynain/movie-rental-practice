<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CintaController;
use App\Http\Controllers\ListaEsperaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\PrestamosActualesController;
use App\Http\Controllers\PrestamosFinalizadosController;
use App\Http\Controllers\SociosController;
use App\Models\Cinta;
use App\Models\ListaEspera;
use App\Models\Pelicula;
use App\Models\PrestamosActuales;
use App\Models\PrestamosFinalizados;
use App\Models\Socios;
use App\Models\User;
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
Route::controller(SociosController::class)->group(function(){
    Route::post('/v1/socio/registrar','registrarSocio');
    Route::post('/v1/socio/baja/{codigoSocio}','bajaSocio');
});

Route::controller(AuthController::class)->group(function(){
    Route::post('/v1/login','login');
    Route::post('/v1/register','register');
    Route::get('/v1/prueba','prueba');
});

Route::controller(PeliculaController::class)->group(function(){
    Route::get('/v1/getAllPeliculas','getMovies');
    Route::get('/v1/getMovie/{titulo}','getPeliculaByNombre');
    Route::post('/v1/newmovie','addPelicula');
});

Route::controller(CintaController::class)->group(function(){
    Route::get('/v1/getCinta/{nombrePelicula}','getCintaWithPelicula');
    Route::get('/v1/getCinta/id/{numeroCinta}','getCintaByNumero');
});

Route::controller(PrestamosActualesController::class)->group(function(){
    Route::post('/v1/prestamo-actual','getPrestamosActualesByFecha');
    Route::get('/v1/prestamo-actual/{codigoSocio}','getPrestamosActualesBySocioId');
    Route::post('/v1/newprestamo','addNewPrestamo');
    Route::post('/v1/finalizarprestamo','concluirPrestamo');
});

Route::controller(PrestamosFinalizadosController::class)->group(function(){
    Route::post('/v1/prestamo-finalizado','getPrestamosFinalizadosByFecha');
    Route::get('/v1/prestamo-finalizado/{codigoSocio}','getPrestamosFinalizadosBySocioId');
});

Route::controller(ListaEsperaController::class)->group(function(){
    Route::get('/v1/getListaEspera/{codigoSocio}','getByPeliculaNombre');
    Route::get('/v1/getAllListaEspera','getAllListaEspera');
    Route::post('/v1/new-cliente','addEsperaCliente');
    Route::post(
        '/v1/remove-cliente-espera/{codigoSocio}/{peliculaFk}',
        'dropEsperaCliente'
    );
});



