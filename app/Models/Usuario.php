<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'apellido',
        'email',
        'password',
        'dni',
        'telefono',
        'direccion',
        'imagen',
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'usuario_id');
    }
       public function vehiculos() 
    {
        return $this->belongsToMany(Vehiculo::class, 'user_vehicle', 'id_usuarios', 'id_vehiculos')
                    ->withPivot('patente','fecha_presentacion','hora_presentacion','estado') 
                    ->withTimestamps();
    }
}
