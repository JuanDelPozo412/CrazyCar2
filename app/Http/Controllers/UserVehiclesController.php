<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class UserVehiclesController extends Controller
{
    public function index()
    {
        // Traer todos los vehiculos
        $vehiculos = Vehiculo::all();

        //Agrupar vehiculos por tipo
        $vehiculosPorTipo = $vehiculos->groupBy('tipo');

        //Enviar datos a la vista
        return view('vehiculosUsuario.user_vehicles', ['vehiculosPorTipo' => $vehiculosPorTipo]);
    }
}
