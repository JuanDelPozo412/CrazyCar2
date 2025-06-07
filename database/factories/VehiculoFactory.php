<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Concesionaria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculo>
 */
class VehiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'marca' => $this->faker->randomElement(['Toyota', 'Ford', 'Chevrolet', 'Honda', 'BMW']),
            'modelo' => $this->faker->word(),
            'color' => $this->faker->safeColorName(),
            'peso' => $this->faker->randomFloat(2, 800, 3000), 
            'estado' => $this->faker->boolean(),
            'concesionaria_id' => Concesionaria::factory()->create()->id,
        ];
    }
}
