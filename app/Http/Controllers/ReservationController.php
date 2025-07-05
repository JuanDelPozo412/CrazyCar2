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
        $empleadoId = Auth::id();

        $reservations = UserVehicle::with(['usuario', 'vehiculo'])->get();

        return view('dashboard.employee.reservations', compact(
            'name',
            'role',
            'reservations'
        ));
    }
}
