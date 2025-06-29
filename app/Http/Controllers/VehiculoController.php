<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Mantenimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $allVehicles = Vehiculo::all();
        $vehiclesForSaleCount = $allVehicles->count();

        $allMaintenances = Mantenimiento::all();
        $vehiclesMaintenanceCount = $allMaintenances->count();

        $vehiclesInMaintenance = $allMaintenances->load('vehiculo');

        return view('dashboard.employee.vehicles', [
            'allVehicles' => $allVehicles,
            'vehiclesForSaleCount' => $vehiclesForSaleCount,
            'vehiclesMaintenanceCount' => $vehiclesMaintenanceCount,
            'vehiclesInMaintenance' => $vehiclesInMaintenance,
            'name' => $user->name,
            'role' => $user->rol,
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'type' => 'required|string|max:50',
            'color' => 'required|string|max:50',
            'year' => 'required|integer|between:1990,' . date('Y'),
            'fuel_type' => 'required|string|max:50',
            'photo' => 'required|image|mimes:jpeg,png,webp|max:5120',
            'patente' => 'nullable|string|max:10|unique:vehiculos,patente',
        ]);

        $imagePath = $request->hasFile('photo')
            ? $request->file('photo')->store('images', 'public')
            : null;

        $vehiculo = new Vehiculo([
            'stock' => $validated['stock'],
            'precio' => $validated['price'],
            'marca' => $validated['brand'],
            'modelo' => $validated['model'],
            'tipo' => $validated['type'],
            'color' => $validated['color'],
            'anio' => $validated['year'],
            'combustible' => $validated['fuel_type'],
            'imagen' => $imagePath,
            'patente' => $validated['patente'] ?? null,
            'propietario_id' => null,
        ]);

        $vehiculo->save();

        return redirect()->route('vehiculos')->with('success', 'Vehículo creado correctamente.');
    }

    public function storeMantenimiento(Request $request)
    {
        $validated = $request->validate([
            'vehiculo_id' => 'required|exists:vehiculos,id',
            'motivo' => 'required|string|max:255',
        ]);

        $vehiculo = Vehiculo::findOrFail($validated['vehiculo_id']);

        Mantenimiento::create([
            'vehiculo_id' => $vehiculo->id,
            'motivo' => $validated['motivo'],
            'estado' => 'Nuevo',
            'fecha_inicio' => now(),
            'fecha_fin' => null,
        ]);

        return redirect()->route('vehiculos')->with('success', 'Mantenimiento creado correctamente.');
    }

    public function show($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return response()->json($vehiculo);
    }

    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return redirect()->route('vehiculos')->with('success', 'Vehículo eliminado correctamente.');
    }
}
