<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mantenimiento;
use App\Models\Vehiculo;

class MantenimientoSeeder extends Seeder
{
    public function run()
    {
        $vehiculos = Vehiculo::all();

        if ($vehiculos->count() === 0) {
            Vehiculo::factory(10)->create();
            $vehiculos = Vehiculo::all();
        }

        foreach ($vehiculos as $vehiculo) {
            Mantenimiento::factory()->count(rand(1, 3))->create([
                'vehiculo_id' => $vehiculo->id,
            ]);
        }
    }
}
