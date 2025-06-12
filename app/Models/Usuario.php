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
        'rol',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

        public function consultas()
    {
        // Asegúrate que la tabla 'consultas' tiene una columna 'usuario_id'
        return $this->hasMany(Consulta::class, 'usuario_id');
    }
}

    /**
     * AÑADIR ESTO: Un usuario puede tener muchos autos favoritos.
     */

