<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Concesionaria;
use App\Models\Usuario;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consulta>
 */
class ConsultaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'concesionaria_id' => $this->faker->randomElement(Concesionaria::pluck('id')->toArray()),
              'usuario_id' => $this->faker->randomElement(Usuario::pluck('id')->toArray()),
              'estado' => $this->faker->boolean(),
        ];
    }
}
