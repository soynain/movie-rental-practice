<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='pelicula';
    protected $primaryKey = 'idPelicula';
    protected $fillable=['nombre','genero_fk','director_fk'];

    public function getGenero(){
        return $this->hasMany(Genero::class,'idGenero','genero_fk');
    }

    public function getDirector(){
        return $this->hasMany(Director::class,'idDirector','director_fk');
    }

    /*when you declare the inverse from a relation, you must set the primary key from
    the parent table, here a movie can have just one copy
    from a tape, and tape has a foreign key pointing
    to movie primary key "idPelicula", so in tape you 
    set idMovie and also here you set the primary key
    so the orm automatically searchs for the foreign key
    "contenido_fk and its relation with "idPelicula"*/
    public function cintaBelongs(){
        return $this->belongsTo(Cinta::class,'idPelicula');
    }
}
