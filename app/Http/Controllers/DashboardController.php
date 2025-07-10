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

            // Inicializo arrays mensuales
            $finalizadasMensuales = array_fill(0, 12, 0);
            $enProcesoMensuales = array_fill(0, 12, 0);
            $nuevasMensuales = array_fill(0, 12, 0);

            // Consultas mensuales por estado
            Consulta::selectRaw('MONTH(fecha) as month, COUNT(*) as count')
                ->where('estado', 'Nueva')
                ->whereYear('fecha', $currentYear)
                ->where('is_deleted', false)
                ->groupBy('month')
                ->get()
                ->each(function ($item) use (&$nuevasMensuales) {
                    $nuevasMensuales[$item->month - 1] = $item->count;
                });

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

            $aprobadasMensuales = array_fill(0, 12, 0);
            $rechazadasMensuales = array_fill(0, 12, 0);
            $pendientesMensuales = array_fill(0, 12, 0);

            UserVehicle::selectRaw('MONTH(fecha_presentacion) as month, COUNT(*) as count')
                ->where('estado', 'Aprobado')
                ->whereYear('fecha_presentacion', $currentYear)
                ->groupBy('month')
                ->get()
                ->each(function ($item) use (&$aprobadasMensuales) {
                    $aprobadasMensuales[$item->month - 1] = $item->count;
                });

            UserVehicle::selectRaw('MONTH(fecha_presentacion) as month, COUNT(*) as count')
                ->where('estado', 'Rechazado')
                ->whereYear('fecha_presentacion', $currentYear)
                ->groupBy('month')
                ->get()
                ->each(function ($item) use (&$rechazadasMensuales) {
                    $rechazadasMensuales[$item->month - 1] = $item->count;
                });

            UserVehicle::selectRaw('MONTH(fecha_presentacion) as month, COUNT(*) as count')
                ->where('estado', 'Pendiente')
                ->whereYear('fecha_presentacion', $currentYear)
                ->groupBy('month')
                ->get()
                ->each(function ($item) use (&$pendientesMensuales) {
                    $pendientesMensuales[$item->month - 1] = $item->count;
                });

            $reservasLabels = ['Aprobadas', 'Rechazadas', 'Pendientes'];
            $reservasData = [$reservasAprobadasCount, $reservasRechazadasCount, $reservasPendientesCount];
            $reservasColors = ['rgba(40, 167, 69, 0.8)', 'rgba(220, 53, 69, 0.8)', 'rgba(255, 193, 7, 0.8)'];

            $nuevasTotales = array_sum($nuevasMensuales);
            $enProcesoTotales = array_sum($enProcesoMensuales);
            $finalizadasTotales = array_sum($finalizadasMensuales);

            $data = [
                'clientesCount' => $clientesCount,
                'empleadosCount' => $empleadosCount,
                'consultasCount' => $consultasCount,
                'inquiriesEnProcesoCount' => $inquiriesEnProcesoCount,
                'consultasFinalizadasCount' => $consultasFinalizadasCount,
                'finalizadasMensuales' => $finalizadasMensuales,
                'enProcesoMensuales' => $enProcesoMensuales,
                'nuevasMensuales' => $nuevasMensuales,
                'aprobadasMensuales' => $aprobadasMensuales,
                'rechazadasMensuales' => $rechazadasMensuales,
                'pendientesMensuales' => $pendientesMensuales,
                'mantenimientosCount' => $mantenimientosCount,
                'vehiclesForSaleCount' => $vehiclesForSaleCount,
                'reservasAprobadasCount' => $reservasAprobadasCount,
                'reservasRechazadasCount' => $reservasRechazadasCount,
                'reservasPendientesCount' => $reservasPendientesCount,
                'reservasLabels' => $reservasLabels,
                'reservasData' => $reservasData,
                'reservasColors' => $reservasColors,
                'nuevasTotales' => $nuevasTotales,
                'enProcesoTotales' => $enProcesoTotales,
                'finalizadasTotales' => $finalizadasTotales,
            ];

            return view('dashboard.employee.index', compact('name', 'role', 'data'));
        }

        // Para empleados
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

        $data = [
            'clientesCount' => $clientesCount,
            'misConsultasFinalizadasTotalCount' => $misConsultasFinalizadasTotalCount,
            'misConsultasEnProcesoCount' => $misConsultasEnProcesoCount,
            'misFinalizadasMensuales' => $misFinalizadasMensuales,
            'misEnProcesoMensuales' => $misEnProcesoMensuales,
        ];

        return view('dashboard.employee.index', compact('name', 'role', 'data'));
    }
}
