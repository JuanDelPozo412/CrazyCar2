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
        $localImagesPath = 'images';
        $allImages = Storage::disk('public')->files($localImagesPath);
        $randomImageFilename = Arr::random($allImages);
        $imageForDb = $randomImageFilename;

        $propietarioId = null;

        $estado = $this->faker->randomElement(['Venta', 'Mantenimiento']);

        $fechadeinicio = null;

        if ($estado === 'Mantenimiento') {
            $fechadeinicio = $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d');

            $clientesIds = Usuario::where('rol', 'Cliente')->pluck('id')->toArray();
            if (!empty($clientesIds)) {
                $propietarioId = $this->faker->randomElement($clientesIds);
            }
        }

        return [
            'patente' => strtoupper($this->faker->bothify('???###')),
            'marca' => $this->faker->randomElement(['Toyota', 'Ford', 'Chevrolet', 'Volkswagen', 'Renault']),
            'modelo' => $this->faker->word(),
            'anio' => $this->faker->numberBetween(1995, date('Y')),
            'color' => $this->faker->safeColorName(),
            'tipo' => $this->faker->randomElement(['Sedán', 'SUV', 'Pick-Up', 'Hatchback', 'Furgón']),
            'combustible' => $this->faker->randomElement(['Nafta', 'Diésel', 'Eléctrico', 'Híbrido']),
            'imagen' => $imageForDb,
            'stock' => $this->faker->numberBetween(0, 100),
            'precio' => $this->faker->numberBetween(10000, 50000),
            'estado' => $estado,
            'fechadeinicio' => $fechadeinicio,
            'propietario_id' => $propietarioId,
        ];
    }
}
