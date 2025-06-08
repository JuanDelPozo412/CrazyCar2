<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'empleado_id',
        'tipo',
        'estado',
        'fecha',
        'patente',
    ];

    // Relaciones (opcionales, si usás Eloquent relationships)
    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Usuario::class, 'empleado_id');
    }

    public function concesionaria()
    {
        return $this->belongsTo(Concesionaria::class);
    }
}
