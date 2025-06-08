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

        $clients = Usuario::where('rol', 'Cliente')->get();

        $inquiries = Consulta::with(['cliente', 'empleado'])->get();

        return view('dashboard.employee.clients', [
            'clients' => $clients,
            'inquiries' => $inquiries,
            'name' => $user->name,
            'role' => $user->rol,
        ]);
    }
}
