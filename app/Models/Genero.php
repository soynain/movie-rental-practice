<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='genero';
    protected $primaryKey = 'idGenero';

    public function movieBelongInverse(){
        return $this->belongsTo(Pelicula::class,'idGenero');
    }
}
