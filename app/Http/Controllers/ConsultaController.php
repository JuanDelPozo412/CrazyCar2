<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        // Cargamos las relaciones con cliente y empleado
        $consultas = Consulta::with(['cliente', 'empleado'])->get();

        return view('dashboard.employee.clients', [
            'inquiries' => $consultas,
        ]);
    }
}
