<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Obtener cantidad de consultas aceptadas (estado = 1) por mes (últimos 12 meses)
        $consultasMensuales = Consulta::where('empleado_id', $user->id)
            ->where('estado', 1)
            ->selectRaw('MONTH(fecha) as mes, COUNT(*) as total')
            ->groupBy('mes')
            ->pluck('total', 'mes')
            ->toArray();

        // Asegurar que todos los meses estén en el array
        $data = array_fill(1, 12, 0);
        foreach ($consultasMensuales as $mes => $total) {
            $data[(int)$mes] = $total;
        }

        return view('dashboard.employee.index', [
            'name' => $user->name,
            'role' => $user->rol ?? 'Empleado',
            'consultasCount' => Consulta::where('empleado_id', $user->id)->count(),
            'consultasMensuales' => json_encode(array_values($data)),
        ]);
    }
}
