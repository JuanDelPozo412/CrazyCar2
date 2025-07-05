<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserVehicleSeeder extends Seeder
{
    protected $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

    public function run(): void
    {
        // Solo usuarios con rol 'cliente'
        $usuarios = Usuario::where('rol', 'cliente')->get();
        $vehiculos = Vehiculo::all();

        if ($usuarios->isEmpty() || $vehiculos->isEmpty()) {
            $this->command->info('No hay usuarios o vehículos para crear relaciones.');
            return;
        }

        foreach ($usuarios as $usuario) {
            if ($vehiculos->isEmpty()) {
                $this->command->warn("Advertencia: No hay vehículos disponibles para adjuntar al usuario ID {$usuario->id}.");
                continue;
            }

            $vehiculosToAttach = $vehiculos->random(rand(1, min(3, $vehiculos->count())));

            foreach ($vehiculosToAttach as $vehiculo) {
                try {
                    $usuario->vehiculos()->attach($vehiculo->id, [
                        'patente' => $this->generateUniquePatente(),
                        'fecha_presentacion' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
                        'hora_presentacion' => $this->faker->time(),
                        'estado' => $this->faker->randomElement(['Pendiente', 'Aprobado', 'Rechazado']),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $this->command->info("Adjuntado Vehículo ID {$vehiculo->id} a Usuario ID {$usuario->id} con patente.");
                } catch (\Illuminate\Database\QueryException $e) {
                    if ($e->getCode() === '23000') {
                        $this->command->warn("Advertencia: No se pudo adjuntar Vehículo ID {$vehiculo->id} a Usuario ID {$usuario->id} (posible duplicado o patente no única).");
                    } else {
                        throw $e;
                    }
                }
            }
        }
    }

    private function generateUniquePatente(): string
    {
        $patente = $this->faker->unique()->regexify('[A-Z0-9]{7}');
        while (DB::table('user_vehicle')->where('patente', $patente)->exists()) {
            $patente = $this->faker->unique()->regexify('[A-Z0-9]{7}');
        }
        return $patente;
    }
}
