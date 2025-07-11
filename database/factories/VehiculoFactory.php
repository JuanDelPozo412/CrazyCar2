<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class VehiculoFactory extends Factory
{
    public function definition(): array
    {
        $localImagesPath = 'vehiculos';
        $allImages = Storage::disk('public')->files($localImagesPath);

        $randomImageFilename = count($allImages)
            ? basename(Arr::random($allImages))
            : null;

        $patente = $this->faker->regexify('[A-Z]{3}-\d{3}');
        


        return [
            'patente' => $patente,
            'marca' => $this->faker->randomElement(['Toyota', 'Ford', 'Chevrolet', 'Volkswagen', 'Renault', 'Honda', 'Bmw', 'Nissan']),
            'modelo' => $this->faker->word(),
            'anio' => $this->faker->numberBetween(1995, date('Y')),
            'color' => $this->faker->safeColorName(),
            'tipo' => $this->faker->randomElement(['Sedan', 'SUV', 'Pickup']),
            'combustible' => $this->faker->randomElement(['Nafta', 'Diesel', 'Electrico', 'Hibrido']),
            'imagen' => $randomImageFilename,
            'stock' => $this->faker->numberBetween(0, 100),
            'precio' => $this->faker->numberBetween(10000, 50000),
        ];
    }
}
