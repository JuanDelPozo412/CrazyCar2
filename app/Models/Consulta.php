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
        'apellido',
        'email',
        'descripcion',
        'titulo',
        'is_deleted',
    ];

    public function cliente()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id')->where('rol', 'cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Usuario::class, 'empleado_id')->where('rol', 'empleado');
    }

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_deleted', false)
            ->where('estado', 0);
    }

    public function isDeleted()
    {
        return $this->is_deleted;
    }
}
