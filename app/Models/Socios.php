<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socios extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='socios';
    protected $primaryKey = 'codigoSocio';

    public function getListaEspera(){
        /*First string parameter is the key that is identified
        as foreign key, second parameter is the key in case there is
        no primary key from the other entity */
        return $this->belongsTo(ListaEspera::class,'codigoSocio','socio_fk');
    }
}
