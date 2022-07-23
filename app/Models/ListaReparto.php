<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaReparto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='listareparto';

    public function getActoresVinculados(){
        return $this->hasMany(Actor::class,'idActor');
    }

    public function getRepartoVinculado(){
        return $this->hasMany(RepartoPeliculas::class,'idReparto');
    }
}
