<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Consulta;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();

        $search = $request->input('busqueda');
        $searchConsulta = $request->input('busqueda_consulta');

        $totalClientesCount = Usuario::where('rol', 'cliente')->count();
        $totalConsultasCount = Consulta::where('is_deleted', 0)->count();

        $clients = Usuario::where('rol', 'cliente')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('apellido', 'like', "%{$search}%")
                        ->orWhere('dni', 'like', "%{$search}%");
                });
            })
            ->get();

        $consultas = Consulta::with(['cliente', 'empleado', 'vehiculo'])
            ->where('is_deleted', false)
            ->active()
            ->when($searchConsulta, function ($query, $searchConsulta) {
                $query->whereHas('cliente', function ($q) use ($searchConsulta) {
                    $q->where('name', 'like', "%{$searchConsulta}%")
                        ->orWhere('apellido', 'like', "%{$searchConsulta}%");
                })
                    ->orWhere('tipo', 'like', "%{$searchConsulta}%");
            })
            ->get();

        return view('dashboard.employee.clients', [
            'clients' => $clients,
            'inquiries' => $consultas,
            'clientesCount' => $totalClientesCount,
            'consultasCount' => $totalConsultasCount,
            'name' => $user->name,
            'role' => $user->rol,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',
            'dni' => 'required|string|max:20|unique:usuarios,dni',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            if ($file->getError() == UPLOAD_ERR_INI_SIZE) {
                return back()->withErrors(['imagen' => 'La imagen excede el tamaño máximo permitido por el servidor.']);
            }
        }

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $validated['imagen'] = basename($imagenPath);
        } else {
            $validated['imagen'] = 'icon-person.jpg';
        }

        $validated['password'] = bcrypt($validated['password']);
        $validated['rol'] = 'cliente';

        Usuario::create($validated);

        return redirect()->route('clientes')->with('success', 'Cliente creado correctamente.');
    }

    public function update(Request $request, Usuario $cliente)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $validated['imagen'] = basename($imagenPath);
        }

        $cliente->update($validated);

        return redirect()->route('clientes')->with('success', 'Cliente actualizado correctamente.');
    }
}
