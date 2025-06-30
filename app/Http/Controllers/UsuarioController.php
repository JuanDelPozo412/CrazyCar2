<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
 $vehiculos = $user->vehiculos;
  
        return view('dashboard.employee.vehicles', [
            'name' => $user->name,
            'role' => $user->rol ?? 'Cliente',
            'vehiculo' => $vehiculos,
        ]);
    }

    public function create()
    {}
        

  
    public function store(Request $request)
    {
       
    }

 
    public function show(Usuario $usuario)
    {
       
    }

  
    public function edit(Usuario $usuario)
    {
       
    }

   
    public function update(Request $request, Usuario $usuario)
    {
     
    }

   
    public function destroy(Usuario $usuario)
    {
     
    }
}
