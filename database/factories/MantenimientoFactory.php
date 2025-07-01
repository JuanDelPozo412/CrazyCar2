<?php

namespace Database\Factories;

use App\Models\Mantenimiento;
use App\Models\Usuario;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


class MantenimientoFactory extends Factory
{

    public function definition(): array
    {
        $usuarios = Usuario::all();
        $clientes = $usuarios->where('rol', 'cliente')->pluck('id')->toArray();

        $localImagesPath = 'images';
        $allImages = Storage::disk('public')->files($localImagesPath);
        $randomImageFilename = Arr::random($allImages);

        if (empty($clientes)) {
            $cliente = Usuario::factory()->create(['rol' => 'cliente']);
            $clientes = [$cliente->id];
        }

        $usuarioId = $this->faker->randomElement($clientes);

        $fechaInicio = $this->faker->dateTimeBetween('-2 months', 'now')->format('Y-m-d');
        $estado = $this->faker->randomElement(['Nuevo', 'En Proceso', 'Finalizado']);

        return [
            'usuario_id' => $usuarioId,
            'marca' => $this->faker->randomElement(['Toyota', 'Ford', 'Renault', 'Peugeot', 'Chevrolet']),
            'modelo' => $this->faker->word(),
            'patente' => $this->faker->regexify('[A-Z]{3}-\d{3}'),
            'motivo' => $this->faker->randomElement([
                'Cambio de Aceite',
                'Alineacion y Balanceo',
                'Cambio de Filtro',
                'Revision de Frenos',
                'Mantenimiento General',
            ]),
            'estado' => $estado,
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $estado === 'Finalizado'
                ? $this->faker->dateTimeBetween($fechaInicio, 'now')->format('Y-m-d')
                : null,
            'imagen' => $randomImageFilename,
        ];
    }
}
