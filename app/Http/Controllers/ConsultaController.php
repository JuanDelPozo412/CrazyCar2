<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConsultaController extends Controller
{
    public function index()
    {
        // Cargamos las relaciones con cliente y empleado
        $consultas = Consulta::with(['cliente', 'empleado', 'vehiculo'])->get();
        return view('dashboard.employee.clients', [
            'inquiries' => $consultas,
        ]);
    }

    public function actualizar(Request $request, Consulta $consulta)
    {
        $request->validate([
            'estado' => 'required|in:en-proceso,finalizado',
            'tomar' => 'nullable|in:si,no',
        ]);

        $consulta->estado = $request->estado === 'finalizado' ? 1 : 0;

        if ($request->tomar === 'si' && !$consulta->empleado_id) {
            $consulta->empleado_id = Auth::id();
        }

        $consulta->save();

        return redirect()->back()->with('success', 'Consulta actualizada correctamente.');
    }
}
