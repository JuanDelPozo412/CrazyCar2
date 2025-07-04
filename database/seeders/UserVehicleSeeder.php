<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker; // Importa la clase Faker

class UserVehicleSeeder extends Seeder
{
    protected $faker; // Declara la propiedad para Faker

    /**
     * Constructor para inicializar Faker.
     */
    public function __construct()
    {
        $this->faker = Faker::create(); // Inicializa Faker aquí
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ELIMINADO: La llamada a UsuarioSeeder::class
        // $this->call(UsuarioSeeder::class);

        // Mantenemos la llamada a VehiculoSeeder::class si es necesaria
        $this->call(VehiculoSeeder::class); // ¡Ajusta si tu seeder de vehículo se llama diferente!

        $usuarios = Usuario::all();
        $vehiculos = Vehiculo::all();

        if ($usuarios->isEmpty() || $vehiculos->isEmpty()) {
            $this->command->info('No hay usuarios o vehículos para crear relaciones.');
            return;
        }

        foreach ($usuarios as $usuario) {
            // Aseguramos que haya suficientes vehículos para adjuntar
            if ($vehiculos->isEmpty()) {
                $this->command->warn("Advertencia: No hay vehículos disponibles para adjuntar al usuario ID {$usuario->id}.");
                continue; // Pasa al siguiente usuario si no hay vehículos
            }
            $vehiculosToAttach = $vehiculos->random(rand(1, min(3, $vehiculos->count())));

            foreach ($vehiculosToAttach as $vehiculo) {
                try {
                    // Adjuntar el vehículo al usuario con el campo 'patente' en la tabla pivote
                    // Asegúrate de que la relación 'vehiculos' en el modelo Usuario esté definida correctamente
                    $usuario->vehiculos()->attach($vehiculo->id, [
                        'patente' => $this->generateUniquePatente(), // Genera una patente única
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

    /**
     * Helper para generar una patente única para el seeder.
     */
    private function generateUniquePatente(): string
    {
        $patente = $this->faker->unique()->regexify('[A-Z0-9]{7}');
        while (DB::table('user_vehicle')->where('patente', $patente)->exists()) {
            $patente = $this->faker->unique()->regexify('[A-Z0-9]{7}');
        }
        return $patente;
    }
}