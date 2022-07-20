<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socios extends Model
{
    use HasFactory;
    protected $timestamp=false;
    protected $table='socios';
    protected $primaryKey = 'codigoSocio';

    public function getListaEspera(){
        return $this->belongsTo(ListaEspera::class,'foreign_key','socio_fk');
    }
}
