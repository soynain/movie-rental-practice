<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $timestamp=false;
    protected $table='director';
    protected $primaryKey = 'idDirector';
}
