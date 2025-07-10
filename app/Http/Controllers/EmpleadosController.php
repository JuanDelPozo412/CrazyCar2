<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpleadosController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $name = $user->name;
        $role = $user->rol;

        $empleadosCount = Usuario::where('rol', 'empleado')->count();

        $query = Usuario::where('rol', 'empleado');

        if ($request->has('busqueda') && $request->busqueda != '') {
            $busqueda = $request->busqueda;
            $query->where(function ($q) use ($busqueda) {
                $q->where('name', 'like', "%$busqueda%")
                    ->orWhere('apellido', 'like', "%$busqueda%")
                    ->orWhere('dni', 'like', "%$busqueda%");
            });
        }

        $employees = $query->get();
        $empleadosCount = Usuario::where('rol', 'empleado')->count();

        return view('dashboard.employee.empleados', compact(
            'name',
            'role',
            'empleadosCount',
            'employees'
        ));
    }
}
