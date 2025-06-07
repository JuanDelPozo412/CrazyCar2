<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = [
            (object)[
                'id' => 1,
                'nombre' => 'Juan',
                'apellido' => 'Pérez',
                'dni' => '12345678',
                'email' => 'juan@example.com',
                'patente' => 'ABC123',
            ],
            (object)[
                'id' => 2,
                'nombre' => 'Maria',
                'apellido' => 'García',
                'dni' => '87654321',
                'email' => 'maria@example.com',
                'patente' => null,
            ],
        ];
        $inquiries = [
            (object)[
                'cliente' => 'Juan Pérez',
                'tipo' => 'Mantenimiento',
                'estado' => 'En Proceso',
                'fecha' => '2025-04-18',
                'patente' => 'ABC123',
                'asignada' => 'L.Gonzales',
            ],
            (object)[
                'cliente' => 'María López',
                'tipo' => 'Compra',
                'estado' => 'Nueva',
                'fecha' => '2025-04-19',
                'patente' => null,
                'asignada' => null,
            ],
            (object)[
                'cliente' => 'Ricardo Gómez',
                'tipo' => 'Cita',
                'estado' => 'Finalizada',
                'fecha' => '2025-04-17',
                'patente' => 'DEF456',
                'asignada' => 'M.Gutierrez',
            ],
        ];

        return view('dashboard.employee.clients', compact('clients', 'inquiries'));
    }
}
