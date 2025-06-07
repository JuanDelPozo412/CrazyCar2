<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $servicios = ['Arreglo', 'Mantenimiento', 'Limpieza', 'Instalacion'];

        foreach ($servicios as $tipo) {
            Servicio::create([
                'tipo' => $tipo,
                'costo' => fake()->randomFloat(2, 100, 1000)
            ]);
        }

    }
}
