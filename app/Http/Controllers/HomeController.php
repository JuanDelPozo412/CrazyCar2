<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class HomeController extends Controller
{
    public function index()
    {
        // Obtiene los 3 vehiculos mas economicos
        $vehiculosEconomicos = Vehiculo::orderBy('precio', 'asc')->take(3)->get();

        return view('welcome', compact('vehiculosEconomicos'));
    }
}
