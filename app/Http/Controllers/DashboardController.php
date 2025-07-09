<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Mantenimiento;
use App\Models\UserVehicle;
use App\Models\Usuario;
use App\Models\Vehiculo;
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

        if ($role === 'admin') {
            $clientesCount = Usuario::where('rol', 'cliente')->count();
            $empleadosCount = Usuario::where('rol', 'empleado')->count();

            $consultasCount = Consulta::where('is_deleted', false)
                ->whereIn('estado', ['Nueva', 'En Proceso', 'Finalizada'])
                ->count();

            $inquiriesEnProcesoCount = Consulta::where('is_deleted', false)
                ->where('estado', 'En Proceso')
                ->count();

            $consultasFinalizadasCount = Consulta::where('is_deleted', false)
                ->where('estado', 'Finalizada')
                ->count();

            $finalizadasMensuales = array_fill(0, 12, 0);
            $enProcesoMensuales = array_fill(0, 12, 0);

            Consulta::selectRaw('MONTH(fecha) as month, COUNT(*) as count')
                ->where('estado', 'Finalizada')
                ->whereYear('fecha', $currentYear)
                ->where('is_deleted', false)
                ->groupBy('month')
                ->get()
                ->each(function ($item) use (&$finalizadasMensuales) {
                    $finalizadasMensuales[$item->month - 1] = $item->count;
                });

            Consulta::selectRaw('MONTH(fecha) as month, COUNT(*) as count')
                ->where('estado', 'En Proceso')
                ->whereYear('fecha', $currentYear)
                ->where('is_deleted', false)
                ->groupBy('month')
                ->get()
                ->each(function ($item) use (&$enProcesoMensuales) {
                    $enProcesoMensuales[$item->month - 1] = $item->count;
                });

            $mantenimientosCount = Mantenimiento::count();
            $vehiclesForSaleCount = Vehiculo::count();
            $reservasAprobadasCount = UserVehicle::where('estado', 'Aprobado')->count();
            $reservasRechazadasCount = UserVehicle::where('estado', 'Rechazado')->count();
            $reservasPendientesCount = UserVehicle::where('estado', 'Pendiente')->count();

            return view('dashboard.employee.index', compact(
                'name',
                'role',
                'clientesCount',
                'empleadosCount',
                'consultasCount',
                'inquiriesEnProcesoCount',
                'consultasFinalizadasCount',
                'finalizadasMensuales',
                'enProcesoMensuales',
                'mantenimientosCount',
                'vehiclesForSaleCount',
                'reservasAprobadasCount',
                'reservasRechazadasCount',
                'reservasPendientesCount'
            ));
        }

        // Datos para el empleado
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
