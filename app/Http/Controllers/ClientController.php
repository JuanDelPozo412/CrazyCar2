<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // $clients = ...; // tu lógica para obtener clientes
        // $inquiries = ...; // tu lógica para obtener consultas
        $user = Auth::user();

        return view('dashboard.employee.clients', [
            // 'clients' => $clients,
            // 'inquiries' => $inquiries,
            'name' => $user->name,
            'role' => $user->rol,
        ]);
    }
}
