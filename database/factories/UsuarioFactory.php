<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{

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
            'imagen' => 'icon-person.jpg',
            'rol' => 'cliente',
        ];
    }

    public function empleado(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'rol' => 'empleado',
            ];
        });
    }
}
