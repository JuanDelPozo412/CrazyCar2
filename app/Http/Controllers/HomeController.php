<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class HomeController extends Controller
{
    public function index()
    {
        $vehiculosEconomicos = Vehiculo::orderBy('precio', 'asc')->take(3)->get();

        $vehiculosPorTipo = Vehiculo::selectRaw('MIN(id) as id')->groupBy('tipo')->pluck('id');

        $vehiculosMasVendidos = Vehiculo::whereIn('id', $vehiculosPorTipo)->get();

        return view('welcome', [
            'vehiculosEconomicos' => $vehiculosEconomicos,
            'vehiculosMasVendidos' => $vehiculosMasVendidos
        ]);
    }
}