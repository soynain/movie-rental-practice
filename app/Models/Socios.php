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
}
