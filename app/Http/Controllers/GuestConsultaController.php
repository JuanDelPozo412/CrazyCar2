<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class GuestConsultaController extends Controller
{
    public function create()
    {
        return view('components.guest.guest_create');
    }

    public function store(Request $request)
    {
  
        $request->validate([
            'nombre_guest' => 'required|string|max:255',
            'apellido_guest' => 'required|string|max:255', 
            'email_guest' => 'required|email|max:255',
            'tipo' => 'required|string|max:255',
            'titulo' => 'required|string|max:255',
            'fecha' => 'required|date',
            'horario' => 'required|date_format:H:i',
            'descripcion' => 'required|string',
        ]);

    
        $consulta = new Consulta();

      
        $consulta->nombre_guest = $request->nombre_guest;
        $consulta->apellido_guest = $request->apellido_guest;
        $consulta->email_guest = $request->email_guest;


        $consulta->tipo = $request->tipo;
        $consulta->titulo = $request->titulo;
        $consulta->fecha = $request->fecha;
        $consulta->horario = $request->horario;
        $consulta->descripcion = $request->descripcion;

        $consulta->is_deleted = false;
        $consulta->usuario_id = null;
        $consulta->empleado_id = null;
        $consulta->estado = 'Nueva';

        $consulta->save();

        return redirect()->route('guest.consultas.create')->with('success', 'Tu consulta ha sido enviada correctamente. Te contactaremos pronto.');
    }
}