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
        'fechadeinicio',
        'estado',
        'imagen',
        'propietario_id'
    ];

    public function propietario()
    {
        return $this->belongsTo(Usuario::class, 'propietario_id');
    }
}
