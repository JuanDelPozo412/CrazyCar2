<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use App\Models\Mantenimiento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $clients = Usuario::where('rol', 'cliente')->orderBy('apellido')->orderBy('name')->get();

        $busquedaVehiculo = $request->input('busqueda_vehiculo');
        $vehiclesQuery = Vehiculo::orderBy('created_at', 'desc');

        if ($busquedaVehiculo) {
            $vehiclesQuery->where(function ($query) use ($busquedaVehiculo) {
                $query->where('marca', 'like', '%' . $busquedaVehiculo . '%')
                    ->orWhere('modelo', 'like', '%' . $busquedaVehiculo . '%')
                    ->orWhere('combustible', 'like', '%' . $busquedaVehiculo . '%');
            });
        }

        $vehiclesFiltered = $vehiclesQuery->get();
        $vehiclesForSaleCount = $vehiclesFiltered->count();
        $vehiclesTotalCount = Vehiculo::count();

        $busquedaMantenimiento = $request->input('busqueda_mantenimiento');

        $mantenimientosQuery = Mantenimiento::with('usuario')->orderByDesc('created_at');

        if ($busquedaMantenimiento) {
            $mantenimientosQuery->where(function ($query) use ($busquedaMantenimiento) {
                $query->where('patente', 'like', '%' . $busquedaMantenimiento . '%')
                    ->orWhere('motivo', 'like', '%' . $busquedaMantenimiento . '%')
                    ->orWhereHas('usuario', function ($q) use ($busquedaMantenimiento) {
                        $q->where('name', 'like', '%' . $busquedaMantenimiento . '%')
                            ->orWhere('apellido', 'like', '%' . $busquedaMantenimiento . '%');
                    });
            });
        }

        $mantenimientosFiltrados = $mantenimientosQuery->get();

        $vehiclesMaintenanceCount = $mantenimientosFiltrados->count();
        $mantenimientosTotales = Mantenimiento::count();

        return view('dashboard.employee.vehicles', [
            'allVehicles' => $vehiclesFiltered,
            'vehiclesForSaleCount' => $vehiclesForSaleCount,
            'vehiclesTotalCount' => $vehiclesTotalCount,
            'vehiclesMaintenanceCount' => $vehiclesMaintenanceCount,
            'mantenimientos' => $mantenimientosFiltrados,
            'mantenimientosTotales' => $mantenimientosTotales,
            'name' => $user->name,
            'role' => $user->rol,
            'busquedaVehiculo' => $busquedaVehiculo,
            'busquedaMantenimiento' => $busquedaMantenimiento,
            'clients' => $clients,
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
