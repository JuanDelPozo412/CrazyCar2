<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consulta;
use App\Models\Usuario;

class ConsultaSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = Usuario::where('rol', 'cliente')->pluck('id')->toArray();
        $empleados = Usuario::where('rol', 'empleado')->pluck('id')->toArray();

        Consulta::factory()->count(10)->create()->each(function ($consulta) use ($clientes, $empleados) {
            $consulta->update([
                'usuario_id' => fake()->randomElement($clientes),
                'empleado_id' => fake()->randomElement($empleados),
            ]);
        });
    }
}
