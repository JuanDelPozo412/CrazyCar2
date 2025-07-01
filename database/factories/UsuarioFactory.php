<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class UsuarioFactory extends Factory
{

    public function definition(): array
    {
        $localImagesPath = 'personas';
        $allImages = Storage::disk('public')->files($localImagesPath);
        $randomImageFilename = $allImages ? basename(Arr::random($allImages)) : 'default-user.png';


        return [
            'name' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'password' => bcrypt('password'),
            'dni' => $this->faker->unique()->numerify('########'),
            'telefono' => $this->faker->unique()->numerify('########'),
            'direccion' => $this->faker->address(),
            'imagen' => $randomImageFilename,
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
