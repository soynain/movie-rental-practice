<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    protected $timestamp=false;
    protected $table='pelicula';
    protected $primaryKey = 'idPelicula';

    public function getGenero(){
        return $this->hasOne(Genero::class,'foreign_key');
    }

    public function getDirector(){
        return $this->hasOne(Director::class,'foreign_key');
    }
}
