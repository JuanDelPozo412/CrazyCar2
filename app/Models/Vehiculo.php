<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{

    use HasFactory;
    protected $fillable = [
        'patente',
        'stock',
        'precio',
        'marca',
        'modelo',
        'tipo',
        'color',
        'año',
        'combustible',
        'motivodemantenimiento',
        'fechadeinicio',
        'estado',
        'imagen',
    ];
}
