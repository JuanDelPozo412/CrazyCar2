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
        'anio',
        'combustible',
        'imagen',
        'propietario_id',
    ];

   public function usuarios() 
    {
       
        return $this->belongsToMany(Usuario::class, 'user_vehicle', 'id_vehiculos', 'id_usuarios')
                    ->withPivot('patente') 
                    ->withTimestamps();
    }
}
