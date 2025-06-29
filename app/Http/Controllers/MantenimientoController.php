<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::with('vehiculo')->get();
        $totalMantenimientos = $mantenimientos->count();

        return view('dashboard.employee.mantenimientos', [
            'mantenimientos' => $mantenimientos,
            'totalMantenimientos' => $totalMantenimientos,
        ]);
    }
}
