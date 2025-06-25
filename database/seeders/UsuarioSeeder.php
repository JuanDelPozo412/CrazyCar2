<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'name' => 'Bruno',
            'apellido' => 'García',
            'email' => 'bruno@gmail.com',
            'password' => Hash::make('bruno123'),
            'dni' => '12345678',
            'telefono' => '2047466264',
            'direccion' => 'Calle 123',
            'imagen' => 'icon-person.jpg',
            'rol' => 'empleado',
        ]);



        Usuario::factory()->count(10)->create();
    }
}
