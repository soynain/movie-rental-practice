<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PeliculaController;
use App\Models\Cinta;
use App\Models\ListaEspera;
use App\Models\Pelicula;
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
Route::controller(AuthController::class)->group(function(){
    Route::post('/v1/login','login');
    Route::post('/v1/register','register');
});

Route::controller(PeliculaController::class)->group(function(){
    Route::get('/v1/getAllPeliculas','getMovies');
    Route::get('/v1/getMovie/{titulo}');
});



