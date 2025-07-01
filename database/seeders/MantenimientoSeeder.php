<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mantenimiento;
use App\Models\Usuario;

class MantenimientoSeeder extends Seeder
{
    public function run()
    {

        $clientes = Usuario::where('rol', 'cliente')->get();

        if ($clientes->count() === 0) {
            Usuario::factory(10)->create(['rol' => 'cliente']);
            $clientes = Usuario::where('rol', 'cliente')->get();
        }

        foreach ($clientes as $cliente) {
            Mantenimiento::factory()->count(rand(1, 5))->create([
                'usuario_id' => $cliente->id,
            ]);
        }
    }
}
