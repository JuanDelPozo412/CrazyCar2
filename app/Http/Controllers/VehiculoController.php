<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehiculoController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        $vehiclesForSale = Vehiculo::where('estado', 'Venta')->get();

        $vehiclesInMaintenance = Vehiculo::where('estado', 'Mantenimiento')->get();


        return view('dashboard.employee.vehicles', [
            'vehiclesForSale' => $vehiclesForSale,
            'vehiclesInMaintenance' => $vehiclesInMaintenance,
            'vehiclesForSaleCount' => $vehiclesForSale->count(),
            'vehiclesMaintenanceCount' => $vehiclesInMaintenance->count(),
            'name' => $user->name,
            'role' => $user->rol,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return response()->json($vehiculo);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vehiculo $vehiculo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return redirect()->route('vehiculos')->with('success', 'Vehículo eliminado correctamente.');
    }
}
