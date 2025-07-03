<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehiculo;

class UserVehicleReservationController extends Controller
{
    // Muestra el formulario de reserva
    public function showForm($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $usuario = Auth::user();

        return view('VistasUsuario.reservar-vehiculo', compact('vehiculo', 'usuario'));
    }
}
