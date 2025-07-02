<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {
        $vehiclesInMaintenance = Mantenimiento::with('usuario')->get();
        $totalMantenimientos = $vehiclesInMaintenance->count();

        return view('dashboard.employee.vehicles', [
            'vehiclesInMaintenance' => $vehiclesInMaintenance,
            'totalMantenimientos' => $totalMantenimientos,
        ]);
    }

    public function storeMantenimiento(Request $request)
    {
        $validated = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'patente' => 'required|string|max:10',
            'motivo' => 'required|string|max:255',
            'imagen' => 'nullable|image|max:2048',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ]);

        $imagePath = $request->hasFile('imagen')
            ? basename($request->file('imagen')->store('vehiculos', 'public'))
            : null;



        Mantenimiento::create([
            'usuario_id' => $validated['usuario_id'],
            'marca' => $validated['marca'],
            'modelo' => $validated['modelo'],
            'patente' => $validated['patente'],
            'motivo' => $validated['motivo'],
            'estado' => 'Nuevo',
            'fecha_inicio' => $validated['fecha_inicio'],
            'fecha_fin' => $validated['fecha_fin'] ?? null,
            'imagen' => $imagePath,
        ]);

        return redirect()->route('vehiculos')->with('success', 'Mantenimiento creado correctamente.');
    }

    public function updateEstado(Request $request, $id)
    {
        $request->validate([
            'estado' => 'required|in:Nuevo,En Proceso,Finalizado',
        ]);

        $mantenimiento = Mantenimiento::findOrFail($id);

        if ($request->estado === 'Finalizado' && $mantenimiento->fecha_fin === null) {
            $mantenimiento->fecha_fin = now();
        }

        if ($request->estado !== 'Finalizado') {
            $mantenimiento->fecha_fin = null;
        }

        $mantenimiento->estado = $request->estado;
        $mantenimiento->save();

        return redirect()->route('vehiculos')->with('success', 'Estado actualizado correctamente.');
    }


    public function destroy($id)
    {
        $mantenimiento = Mantenimiento::findOrFail($id);
        $mantenimiento->delete();

        return redirect()->route('vehiculos')->with('success', 'Mantenimiento eliminado correctamente.');
    }
}
