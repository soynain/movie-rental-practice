<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinta extends Model
{
    use HasFactory;
    protected $timestamp=false;
    protected $table='cinta';
    protected $primaryKey = 'numeroCinta';

    public function getContenido(){
        return $this->hasOne(Pelicula::class,'foreign_key');
    }
}
