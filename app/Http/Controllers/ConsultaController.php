<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    public function store(Request $request)
    {
        $authenticatedUser = Auth::user();

        $request->validate([
            'tipo' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'horario' => 'required|date_format:H:i',
            'descripcion' => 'required|string',
        ]);

        $consulta = new Consulta();
        $consulta->tipo = $request->tipo;
        $consulta->titulo = $request->titulo;
        $consulta->fecha = $request->fecha;
        $consulta->horario = $request->horario;
        $consulta->descripcion = $request->descripcion;
        $consulta->is_deleted = false;

        if ($authenticatedUser->rol === 'empleado') {
            $request->validate([
                'usuario_id' => 'required|exists:usuarios,id',
            ]);
            $consulta->usuario_id = $request->usuario_id;
            $consulta->empleado_id = $authenticatedUser->id;
            $consulta->estado = 'En Proceso';
            $message = 'Consulta creada correctamente y puesta en proceso.';
        } elseif ($authenticatedUser->rol === 'cliente') {
            $consulta->usuario_id = $authenticatedUser->id;
            $consulta->empleado_id = null;
            $consulta->estado = 'Nueva';
            $message = 'Consulta creada correctamente y en espera de ser procesada.';
        } else {
            return redirect()->back()->with('error', 'Acción no autorizada para este rol.');
        }

        $consulta->save();
        return redirect()->route('clientes')->with('success', $message);
    }

    public function actualizar(Request $request, Consulta $consulta)
    {
        $request->validate([
            'estado' => 'required|in:Nueva,En Proceso,Finalizada',
            'tomar' => 'nullable|in:si,no',
            'fecha' => 'required|date',
            'horario' => 'required|date_format:H:i',
        ]);

        $consulta->fecha = $request->fecha;
        $consulta->horario = $request->horario;

        if ($request->tomar === 'si' && !$consulta->empleado_id) {
            $consulta->empleado_id = Auth::id();

            if ($consulta->estado === 'Nueva') {
                $consulta->estado = 'En Proceso';
            }
        } else {
            $consulta->estado = $request->estado;
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
