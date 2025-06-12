<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */

    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'password' => bcrypt('password'),
            'dni' => $this->faker->unique()->numerify('########'),
            'telefono' => $this->faker->unique()->numerify('########'),
            'direccion' => $this->faker->address(),
            'rol' => 'cliente',
        ];
    }
}
