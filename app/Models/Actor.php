<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table='actor';
    protected $primaryKey = 'idActor';
    
}
