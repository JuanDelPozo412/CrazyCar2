<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $name = $user->name;
        $role = $user->rol;
        $empleadoId = Auth::id();

        $currentYear = Carbon::now()->year;

        $clientesCount = Usuario::where('rol', 'cliente')->count();

        $misConsultasFinalizadasTotalCount = Consulta::where('is_deleted', false)
            ->where('empleado_id', $empleadoId)
            ->where('estado', 'Finalizada')
            ->whereYear('fecha', $currentYear)
            ->count();

        $misConsultasEnProcesoCount = Consulta::where('is_deleted', false)
            ->where('empleado_id', $empleadoId)
            ->where('estado', 'En Proceso')
            ->whereYear('fecha', $currentYear)
            ->count();

        $misFinalizadasMensuales = array_fill(0, 12, 0);
        $misTomadasMensuales = array_fill(0, 12, 0);
        $misEnProcesoMensuales = array_fill(0, 12, 0);

        Consulta::selectRaw('MONTH(fecha) as month, COUNT(*) as count')
            ->where('empleado_id', $empleadoId)
            ->where('estado', 'Finalizada')
            ->whereYear('fecha', $currentYear)
            ->where('is_deleted', false)
            ->groupBy('month')
            ->get()
            ->each(function ($item) use (&$misFinalizadasMensuales) {
                $misFinalizadasMensuales[$item->month - 1] = $item->count;
            });


        Consulta::selectRaw('MONTH(fecha) as month, COUNT(*) as count')
            ->where('empleado_id', $empleadoId)
            ->where('estado', 'En Proceso')
            ->whereYear('fecha', $currentYear)
            ->where('is_deleted', false)
            ->groupBy('month')
            ->get()
            ->each(function ($item) use (&$misEnProcesoMensuales) {
                $misEnProcesoMensuales[$item->month - 1] = $item->count;
            });


        return view('dashboard.employee.index', compact(
            'name',
            'role',
            'clientesCount',
            'misConsultasFinalizadasTotalCount',
            'misConsultasEnProcesoCount',
            'misFinalizadasMensuales',
            'misEnProcesoMensuales'
        ));
    }
}
