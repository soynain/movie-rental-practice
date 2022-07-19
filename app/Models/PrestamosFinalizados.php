<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestamosFinalizados extends Model
{
    use HasFactory;
    protected $timestamp=false;
    protected $table='prestamosfinalizados';

    public function getSocios(){
        return $this->hasMany(Socios::class,'foreign_key');
    }

    public function getCintaRentada(){
        return $this->hasOne(Cinta::class,'foreign_key');
    }
}