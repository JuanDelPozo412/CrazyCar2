<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserVehicle extends Model
{
    use HasFactory;

    protected $table = 'user_vehicle';

    protected $fillable = [
        'id_usuarios',
        'id_vehiculos',
        'fecha_presentacion',
        'hora_presentacion',
        'estado',
        'patente',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuarios');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculos');
    }
}
