<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepartoPeliculas extends Model
{
    use HasFactory;
    protected $timestamp=false;
    public $timestamps = false;
    protected $primaryKey = 'idReparto';


    public function getPeliculaAsociada(){
        return $this->hasMany(Pelicula::class,'idPelicula');
    }
}
