<?php

namespace Database\Factories;

use App\Models\Usuario;  // ¡Importa tu modelo Usuario!
use App\Models\Vehiculo; // ¡Importa tu modelo Vehiculo!
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserVehicle>
 */
class UserVehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Obtener un ID de usuario y vehículo existente, o crearlos si no hay
        $usuarioId = Usuario::inRandomOrder()->first()->id ?? Usuario::factory()->create()->id;
        $vehiculoId = Vehiculo::inRandomOrder()->first()->id ?? Vehiculo::factory()->create()->id;

        return [
            'id_usuarios' => $usuarioId,  // ¡Nombre de columna de tu tabla pivote!
            'id_vehiculos' => $vehiculoId, // ¡Nombre de columna de tu tabla pivote!
            'patente' => $this->faker->unique()->regexify('[A-Z0-9]{7}'), // Genera una patente única
        ];
    }
}