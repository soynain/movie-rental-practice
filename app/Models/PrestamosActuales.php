<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosActuales extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='prestamosactuales';
    protected $fillable=['socio_fk','cinta_fk','fechaInicioPrestamo'];

    public function getSocios(){
        return $this->hasMany(Socios::class,'codigoSocio','socio_fk');
    }

    public function getCintaRentada(){
        return $this->hasOne(Cinta::class,'numeroCinta','cinta_fk');
    }
}
