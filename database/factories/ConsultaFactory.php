<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
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
            'fecha' => $this->faker->date(),
            'patente' => strtoupper($this->faker->bothify('???###')),
        ];
    }
}
