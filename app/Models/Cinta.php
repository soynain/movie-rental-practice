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
        return $this->hasOne(Pelicula::class,'idPelicula','contenido_fk');
    }

    /*Because PrestamosActuales doesnt have a primary key, we
    reforce the relationship indicating the foreign key
    in the third parameter*/
    public function VerificarDisponibilidadCinta(){
        return $this->belongsTo(PrestamosActuales::class,'numeroCinta');
    }

    public function HistorialPrestamosFinalizados(){
        return $this->belongsTo(PrestamosFinalizados::class,'numeroCinta');
    }
}
