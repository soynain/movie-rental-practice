<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='director';
    protected $primaryKey = 'idDirector';

    public function directorBelongInverse(){
        return $this->belongsTo(Pelicula::class,'idDirector');
    }
}
