<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehiculo;
use App\Models\UserVehicle;

class UserVehicleReservationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'fecha_presentacion' => 'required|date',
            'hora_presentacion' => 'required',
        ]);

        // Validar si ya existe una reserva para este usuario y vehículo
        $existeReserva = UserVehicle::where('id_usuarios', Auth::id())
            ->where('id_vehiculos', $request->vehiculo_id)
            ->exists();

        if ($existeReserva) {
            return redirect()->back()->withErrors('Ya tienes una reserva para este vehículo.');
        }

        UserVehicle::create([
            'id_usuarios' => Auth::id(),
            'id_vehiculos' => $request->vehiculo_id,
            'fecha_presentacion' => $request->fecha_presentacion,
            'hora_presentacion' => $request->hora_presentacion,
            'estado' => 'Pendiente',
            'patente' => null,
        ]);

        return redirect()->back()->with('success', '¡Reserva creada correctamente!');
    }

    // Muestra el formulario de reserva
    public function showForm($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $usuario = Auth::user();

        return view('VistasUsuario.reservar-vehiculo', compact('vehiculo', 'usuario'));
    }
}
