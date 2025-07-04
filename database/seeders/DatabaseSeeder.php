<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            UsuarioSeeder::class,
            VehiculoSeeder::class,
            UserVehicleSeeder::class, 
            ConsultaSeeder::class,
            MantenimientoSeeder::class,

        ]);
    }
}
