<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Consulta;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $clients = Usuario::where('rol', 'cliente')->get();
        $consultas = Consulta::with(['cliente', 'empleado', 'vehiculo'])->get();

        return view('dashboard.employee.clients', [
            'clients' => $clients,
            'inquiries' => $consultas,
            'clientesCount' => $clients->count(),
            'consultasCount' => $consultas->count(),
            'name' => $user->name,
            'role' => $user->rol,
        ]);
    }
}
