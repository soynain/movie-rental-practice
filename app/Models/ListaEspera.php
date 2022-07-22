<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ListaEspera extends Model
{
    use HasFactory;
    protected $timestamp=false;
    protected $table='listaespera';
   

    public function getSocio():HasMany{
        /*this is the foreign key*/
        return $this->hasMany(Socios::class,'codigoSocio','socio_fk');
    }

    public function getPeliculaAEsperar(){
        return $this->hasMany(Pelicula::class,'idPelicula','pelicula_fk');
    }
}
