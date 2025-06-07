<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        // Simular datos de vehículos (puedes traerlos de la DB luego)
        $vehiclesForSale = [
            (object)[
                'id' => 1,
                'patente' => 'ABC123',
                'stock' => 5,
                'precio' => 15000,
                'marca' => 'Toyota',
                'modelo' => 'Corolla',
                'tipo' => 'Sedán',
                'color' => 'Rojo',
                'año' => 2020,
                'combustible' => 'Gasolina',
            ],
            (object)[
                'id' => 2,
                'patente' => 'XYZ789',
                'stock' => 3,
                'precio' => 20000,
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'tipo' => 'Sedán',
                'color' => 'Azul',
                'año' => 2021,
                'combustible' => 'Gasolina',
            ],

        ];

        $vehiclesInMaintenance = [
            (object)[
                'id' => 1,
                'patente' => 'XYZ456',
                'marca' => 'Toyota',
                'modelo' => 'Camry',
                'tipo' => 'Sedán',
                'color' => 'Negro',
                'año' => 2021,
                'motivodemantenimiento' => 'Cambio de motor',
                'fechadeinicio' => '2025-04-15',
                'estado' => 'Pendiente',
            ],
            (object)[
                'id' => 2,
                'patente' => 'DEF789',
                'marca' => 'Ford',
                'modelo' => 'Mustang',
                'tipo' => 'Deportivo',
                'color' => 'Rojo',
                'año' => 2020,
                'motivodemantenimiento' => 'Reemplazo de suspensión',
                'fechadeinicio' => '2025-04-17',
                'estado' => 'Completado',
            ],
            (object)[
                'id' => 3,
                'patente' => 'LMN123',
                'marca' => 'Honda',
                'modelo' => 'Civic',
                'tipo' => 'Sedán',
                'color' => 'Azul',
                'año' => 2022,
                'motivodemantenimiento' => 'Revisión general',
                'fechadeinicio' => '2025-04-18',
                'estado' => 'En Proceso',
            ],
        ];


        return view('dashboard.employee.vehicles', compact('vehiclesForSale', 'vehiclesInMaintenance'));
    }
}
