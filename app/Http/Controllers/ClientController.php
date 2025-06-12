<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Consulta;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

   
        $search = $request->input('busqueda');

    
        $clients = Usuario::where('rol', 'cliente')
        ->when($search, function ($query, $search) { 
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('apellido', 'like', "%{$search}%")
                      ->orWhere('dni', 'like', "%{$search}%");
                });
            })
            ->get();

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
