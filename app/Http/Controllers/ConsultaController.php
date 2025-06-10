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
        // Validamos entrada
        $request->validate([
            'estado' => 'required|in:en-proceso,finalizado',
            'tomar' => 'nullable|in:si,no',
        ]);

        // Actualizamos estado
        $consulta->estado = $request->estado === 'finalizado' ? 1 : 0;

        // Asignamos empleado solo si aún no está asignado
        if ($request->tomar === 'si' && !$consulta->empleado_id) {
            $consulta->empleado_id = Auth::id();
        }

        $consulta->save();

        // Redirigimos a la vista anterior con un mensaje de éxito
        return redirect()->route('clientes')->with('success', 'Consulta actualizada correctamente.');
    }
}
