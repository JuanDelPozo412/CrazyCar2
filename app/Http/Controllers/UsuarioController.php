<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $vehiculos = $user->vehiculos;

        return view('dashboard.employee.vehicles', [
            'name' => $user->name,
            'role' => $user->rol ?? 'Cliente',
            'vehiculo' => $vehiculos,
        ]);
    }
}
