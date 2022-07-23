<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosFinalizados extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='prestamosfinalizados';
    protected $fillable=['socio_fk','cinta_fk','fechaFinPrestamo'];

    public function getSocios(){
        return $this->hasMany(Socios::class,'codigoSocio','socio_fk');
    }

    public function getCintaRentada(){
        return $this->hasOne(Cinta::class,'numeroCinta','cinta_fk');
    }
}
