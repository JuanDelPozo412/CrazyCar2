<?php

namespace App\Http\Controllers;

use App\Models\UserVehicle;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $name = $user->name;
        $role = $user->rol;

        $busqueda = $request->input('busqueda_reserva');
        $estado = $request->input('estado');
        $soloFuturas = $request->filled('proximas');

        $totalReservations = UserVehicle::count();

        $reservationsQuery = UserVehicle::with(['usuario', 'vehiculo'])
            ->orderBy('fecha_presentacion', 'desc')
            ->orderBy('hora_presentacion', 'desc');

        if ($busqueda) {
            $reservationsQuery->where(function ($query) use ($busqueda) {
                $query->whereHas('usuario', function ($query) use ($busqueda) {
                    $query->where('name', 'like', "%$busqueda%")
                        ->orWhere('apellido', 'like', "%$busqueda%")
                        ->orWhere('dni', 'like', "%$busqueda%");
                })->orWhereHas('vehiculo', function ($query) use ($busqueda) {
                    $query->where('marca', 'like', "%$busqueda%");
                });
            });
        }

        if ($estado) {
            $reservationsQuery->where('estado', $estado);
        }

        if ($soloFuturas) {
            $reservationsQuery->where(function ($query) {
                $query->whereNull('estado')
                    ->orWhere('estado', 'Pendiente');
            })->whereDate('fecha_presentacion', '>=', Carbon::today());
        }

        $reservations = $reservationsQuery->get();

        return view('dashboard.employee.reservations', compact(
            'name',
            'role',
            'reservations',
            'totalReservations',
            'busqueda',
            'estado'
        ));
    }


    public function updateEstado($id)
    {
        $request = request();
        $estadoValido = ['Pendiente', 'Aprobado', 'Rechazado'];

        $request->validate([
            'estado' => ['required', 'in:' . implode(',', $estadoValido)],
        ]);

        $reserva = UserVehicle::findOrFail($id);
        $reserva->estado = $request->input('estado');
        $reserva->save();

        return redirect()->back()->with('success', 'Estado de la reserva actualizado correctamente.');
    }
}
