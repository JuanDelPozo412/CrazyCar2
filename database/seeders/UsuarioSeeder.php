<?php

namespace Database\Seeders;

use App\Models\Usuario;
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

          Usuario::create([
            'name' => 'Bruno',
            'apellido' => 'García',
            'email' => 'brunoadmin@gmail.com',
            'password' => Hash::make('bruno123'),
            'dni' => '88127712',
            'telefono' => '451234567',
            'direccion' => 'Calle 123',
            'imagen' => 'icon-person.jpg',
            'rol' => 'admin',
        ]);

        Usuario::create([
            'name' => 'Diego',
            'apellido' => 'Maidana',
            'email' => 'diegoshhh@gmail.com',
            'password' => Hash::make('diego123'),
            'dni' => '3532233',
            'telefono' => '295423442',
            'direccion' => 'Selva Norte 2423',
            'imagen' => 'icon-person.jpg',
            'rol' => 'admin',
        ]);
        Usuario::create([
            'name' => 'Juan',
            'apellido' => 'Pozo',
            'email' => 'juan@gmail.com',
            'password' => Hash::make('juan123'),
            'dni' => '9483773',
            'telefono' => '11848499',
            'direccion' => 'Garibaldi 5323',
            'imagen' => 'icon-person.jpg',
            'rol' => 'empleado',
        ]);
        Usuario::create([
            'name' => 'Thiago',
            'apellido' => 'Cabral',
            'email' => 'thiago@gmail.com',
            'password' => Hash::make('thiago123'),
            'dni' => '4662552',
            'telefono' => '65537377',
            'direccion' => 'Torroba 43',
            'imagen' => 'icon-person.jpg',
            'rol' => 'empleado',
        ]);



        Usuario::factory()->count(10)->create(['rol' => 'cliente']);
    }
}
