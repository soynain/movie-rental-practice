<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosActuales extends Model
{
    use HasFactory;
    protected $timestamp=false;
    protected $table='prestamosactuales';

    public function getSocios(){
        return $this->hasMany(Socios::class,'codigoSocio','socio_fk');
    }

    public function getCintaRentada(){
        return $this->hasOne(Cinta::class,'numeroCinta','cinta_fk');
    }
}
