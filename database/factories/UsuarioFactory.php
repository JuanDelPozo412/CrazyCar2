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

    // Schema::create('usuarios', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('nombre')->unique();
    //         $table->string('apellido');
    //         $table->string('email')->unique();
    //         $table->integer('dni');
    //         $table->timestamps();
    //     });

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'contrasena' => bcrypt('password'), 
            'dni' => $this->faker->unique()->numerify('########'),
        ];
    }
}
