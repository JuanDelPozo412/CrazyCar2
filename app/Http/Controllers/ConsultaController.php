<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConsultaController extends Controller
{
    public function index()
    {

        $consultas = Consulta::with(['cliente', 'empleado', 'vehiculo'])
            ->active()
            ->get();

        $consultasCount = Consulta::active()->count();

        return view('dashboard.employee.clients', [
            'inquiries' => $consultas,
            'consultasCount' => $consultasCount,
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

        return redirect()->route('clientes')->with('success', 'Consulta actualizada correctamente.');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->is_deleted = true;
        $consulta->save();

        return redirect()->route('clientes')->with('success', 'Consulta marcada como eliminada correctamente.');
    }
}
