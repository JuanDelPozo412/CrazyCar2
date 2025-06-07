<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servicio>
 */
class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    //   $table->string('tipo')->unique();
    //         $table->double('costo');
    public function definition(): array
    {
        return [
            'tipo' => $this->faker->randomElement(['Arreglo', 'Mantenimiento', 'Limpieza','Instalacion']),
            'costo' => $this->faker->randomFloat(300,1000,5000),
        ];
    }
}
