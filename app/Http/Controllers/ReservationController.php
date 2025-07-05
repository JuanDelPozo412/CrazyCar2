<?php

namespace App\Http\Controllers;

use App\Models\UserVehicle;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $name = $user->name;
        $role = $user->rol;

        $busqueda = request('busqueda_reserva');

        $reservationsQuery = UserVehicle::with(['usuario', 'vehiculo'])
            ->orderBy('fecha_presentacion', 'desc')
            ->orderBy('hora_presentacion', 'desc');

        if ($busqueda) {
            $reservationsQuery->whereHas('usuario', function ($query) use ($busqueda) {
                $query->where('name', 'like', "%$busqueda%")
                    ->orWhere('apellido', 'like', "%$busqueda%")
                    ->orWhere('dni', 'like', "%$busqueda%");
            })->orWhereHas('vehiculo', function ($query) use ($busqueda) {
                $query->where('marca', 'like', "%$busqueda%");
            });
        }

        $reservations = $reservationsQuery->get();
        $totalReservations = $reservations->count();

        return view('dashboard.employee.reservations', compact(
            'name',
            'role',
            'reservations',
            'totalReservations',
            'busqueda'
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
