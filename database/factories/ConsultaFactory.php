<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class ConsultaFactory extends Factory
{
    public function definition(): array
    {
        $usuarios = Usuario::all();

        $clientes = $usuarios->where('rol', 'cliente')->pluck('id')->toArray();
        $empleados = $usuarios->where('rol', 'empleado')->pluck('id')->toArray();

        $estado = $this->faker->randomElement(['Nueva', 'En Proceso', 'Finalizada']);

        $empleadoId = null;
        if ($estado === 'En Proceso' || $estado === 'Finalizada') {
            $empleadoId = $this->faker->randomElement($empleados);
        }

        return [
            'usuario_id' => $this->faker->randomElement($clientes),
            'empleado_id' => $empleadoId,
            'tipo' => $this->faker->randomElement(['Compra', 'Mantenimiento']),
            'estado' => $estado,
            'fecha' => $this->faker->dateTimeBetween(date('Y') . '-01-01', 'now')->format('Y-m-d'),
            'horario' => $this->faker->time('H:i'),
            'titulo' => $this->faker->sentence(4),
            'descripcion' => $this->faker->paragraph(),
            'is_deleted' => false,
        ];
    }
}
