<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Concesionaria;
use App\Models\Vehiculo;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Planilla>
 */
class PlanillaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'concesionaria_id' => Concesionaria::factory(), 
             'vehiculo_id' => Vehiculo::factory(),
        ];
    }
}
