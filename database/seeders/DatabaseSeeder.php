<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UsuarioSeeder::class,
            ConcesionariaSeeder::class,
            RolSeeder::class,
            VehiculoSeeder::class,
            ServicioSeeder::class,
            PlanillaSeeder::class,
            ConsultaSeeder::class,
        ]);
    }
}
