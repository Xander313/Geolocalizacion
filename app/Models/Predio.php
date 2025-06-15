<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Predio extends Model
{
    //
    use HasFactory;
    protected $fillable=[
        'propietario',
        'claveCatastral',
        'latitud1',
        'longitud1',
        'latitud2',
        'longitud2',
        'latitud3',
        'longitud3',
        'latitud4',
        'longitud4'
    ];
}
