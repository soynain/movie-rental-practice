<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaEspera extends Model
{
    use HasFactory;
    protected $timestamp=false;
    protected $table='listaespera';

    public function getSocio(){
        return $this->hasMany(Socios::class,'foreign_key');
    }

    public function getPeliculaAEsperar(){
        return $this->hasMany(Pelicula::class,'foreign_key');
    }
}
