<?php

namespace Database\Seeders;

use App\Models\Vehiculo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class VehiculoSeeder extends Seeder
{
    public function run(): void
    {
        Vehiculo::factory()
            ->count(20)
            ->create([
                'patente' => null,
                'propietario_id' => null,
            ]);
    }
}
