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

        Consulta::factory()->count(30)->create()->each(function ($consulta) use ($clientes) {
            $consulta->update([
                'usuario_id' => fake()->randomElement($clientes),
            ]);
        });
    }
}
