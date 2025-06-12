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


        //Obtener filtro de busqueda clients
        $search = $request->input('busqueda');

        //filtro de busqueda consultas
        $searchConsulta = $request->input('busqueda_consulta');

        //Panel de clientes con filtro por nombre, apellido o DNI
        $clients = Usuario::where('rol', 'cliente')
        ->when($search, function ($query, $search) { 
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('apellido', 'like', "%{$search}%")
                      ->orWhere('dni', 'like', "%{$search}%");
                });
            })
            ->get();

        //Panel de consultas con filtro por nombre, apellido y tipo
        $consultas = Consulta::with(['cliente', 'empleado', 'vehiculo'])
        ->when($searchConsulta, function ($query, $searchConsulta) {
            $query->whereHas('cliente', function ($q) use ($searchConsulta) {
                $q->where('name', 'like', "%{$searchConsulta}%")
                ->orWhere('apellido', 'like', "%{$searchConsulta}%");
            })
            ->orWhere('tipo', 'like', "%{$searchConsulta}%");
        })
        ->get();

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
