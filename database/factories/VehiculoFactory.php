<?php

namespace Database\Factories;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class VehiculoFactory extends Factory
{
    public function definition(): array
    {
        $url = 'https://picsum.photos/640/480/transport?random=' . rand(1, 1000);
        $imageContent = Http::get($url)->body();
        $filename = 'images/' . uniqid() . '.jpg';
        Storage::disk('public')->put($filename, $imageContent);

        return [
            'patente' => strtoupper($this->faker->bothify('???###')),
            'marca' => $this->faker->randomElement(['Toyota', 'Ford', 'Chevrolet', 'Volkswagen', 'Renault']),
            'modelo' => $this->faker->word(),
            'anio' => $this->faker->numberBetween(1995, date('Y')),
            'color' => $this->faker->safeColorName(),
            'tipo' => $this->faker->randomElement(['Sedán', 'SUV', 'Pick-Up', 'Hatchback', 'Furgón']),
            'combustible' => $this->faker->randomElement(['Nafta', 'Diésel', 'Eléctrico', 'Híbrido']),
            'imagen' => $filename

        ];
    }
}
