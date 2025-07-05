<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;

class UserVehiclesController extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();

        $vehiculosPorTipo = $vehiculos->groupBy('tipo');

        return view('vehiculosUsuario.user_vehicles', ['vehiculosPorTipo' => $vehiculosPorTipo]);
    }
}
