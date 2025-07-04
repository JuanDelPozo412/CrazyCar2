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
        'horario',
        'descripcion',
        'titulo',
        'nombre_guest',
        'email_guest',
        'apellido_guest',
        'is_deleted',
    ];

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function empleado()
    {
        return $this->belongsTo(Usuario::class, 'empleado_id');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function scopeActive($query)
    {

        return $query->where('is_deleted', false)
            ->whereIn('estado', ['Nueva', 'En Proceso', 'Finalizada']);
    }

    public function isDeleted()
    {
        return $this->is_deleted;
    }
}
