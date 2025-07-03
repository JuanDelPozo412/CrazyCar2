<?php

namespace App\Http\Controllers;

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

        return view('dashboard.employee.reservation', compact(
            'name',
            'role',
        ));
    }
}
