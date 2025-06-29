<?php

namespace Database\Factories;

use App\Models\Mantenimiento;
use App\Models\Vehiculo;
use Illuminate\Database\Eloquent\Factories\Factory;

class MantenimientoFactory extends Factory
{
    protected $model = Mantenimiento::class;

    public function definition(): array
    {
        $fechaInicio = $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d');

        $estado = $this->faker->randomElement(['Nuevo', 'En Proceso', 'Finalizado']);

        return [
            'motivo' => $this->faker->randomElement([
                'Cambio de Aceite',
                'Alineación y Balanceo',
                'Cambio de Filtro',
                'Revisión de Frenos',
                'Mantenimiento General',
            ]),
            'estado' => $estado,
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $estado === 'Finalizado' ? $this->faker->dateTimeBetween($fechaInicio, 'now')->format('Y-m-d') : null,
        ];
    }
}
