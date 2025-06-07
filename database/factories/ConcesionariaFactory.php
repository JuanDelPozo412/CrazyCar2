<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Concesionaria>
 */
class ConcesionariaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

//   Schema::create('concesionarias', function (Blueprint $table) {
//             $table->id();
//             $table->string('nombre')->unique();
//             $table->string('Ubicacion');
//             $table->timestamps();
//         });

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->unique()->company(), 
            'Ubicacion' => $this->faker->city(),
        ];
    }
}
