<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use Illuminate\Support\Str;


class ConsultaFactory extends Factory
{
    public function definition(): array
    {
        $usuarios = Usuario::all();
        $clientes = $usuarios->where('rol', 'Cliente')->pluck('id')->toArray();
        $empleados = $usuarios->where('rol', 'Empleado')->pluck('id')->toArray();

        return [
            'usuario_id' => $this->faker->randomElement($clientes),
            'empleado_id' => $this->faker->randomElement($empleados),
            'tipo' => $this->faker->randomElement(['Compra', 'Mantenimiento']),
            'estado' => $this->faker->boolean(),
            'fecha' => $this->faker->dateTimeBetween(date('Y') . '-01-01', 'now')->format('Y-m-d'),
            'horario' => $this->faker->time('H:i'),
            'titulo' => $this->faker->sentence(4),
            'descripcion' => $this->faker->paragraph(),
        ];
    }
}
