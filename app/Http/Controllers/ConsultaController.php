<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ConsultaController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'tipo' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'horario' => 'required|date_format:H:i',
            'descripcion' => 'required|string',
        ]);

        $consulta = new Consulta();
        $consulta->usuario_id = $request->usuario_id;
        $consulta->tipo = $request->tipo;
        $consulta->titulo = $request->titulo;
        $consulta->fecha = $request->fecha;
        $consulta->horario = $request->horario;
        $consulta->descripcion = $request->descripcion;
        $consulta->empleado_id = Auth::id();
        $consulta->estado = false;
        $consulta->is_deleted = false;

        $consulta->save();

        return redirect()->route('clientes')->with('success', 'Consulta creada correctamente.');
    }

    public function actualizar(Request $request, Consulta $consulta)
    {
        $request->validate([
            'estado' => 'required|in:en-proceso,finalizado',
            'tomar' => 'nullable|in:si,no',
            'fecha' => 'required|date',
            'horario' => 'required|date_format:H:i',
        ]);


        $consulta->estado = $request->estado === 'finalizado' ? 1 : 0;
        $consulta->fecha = $request->fecha;
        $consulta->horario = $request->horario;

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
