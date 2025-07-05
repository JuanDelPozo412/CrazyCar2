<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Consulta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        // Clientes - sin cambios
        $user = Auth::user();
        $name = $user->name;
        $role = $user->rol;

        $clientesQuery = Usuario::where('rol', 'cliente');

        if ($request->filled('busqueda')) {
            $searchTermClient = strtolower($request->busqueda);
            $clientesQuery->where(function ($q) use ($searchTermClient) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTermClient . '%'])
                    ->orWhereRaw('LOWER(apellido) LIKE ?', ['%' . $searchTermClient . '%'])
                    ->orWhereRaw('LOWER(dni) LIKE ?', ['%' . $searchTermClient . '%']);
            });
        }

        $clients = $clientesQuery->orderBy('created_at', 'desc')->get();
        $clientesCount = Usuario::where('rol', 'cliente')->count();

        // Consultas
        $inquiriesQuery = Consulta::query();
        $inquiriesQuery->where('is_deleted', false);

        // Filtrar estados si viene el filtro
        if ($request->filled('estado')) {
            $inquiriesQuery->where('estado', $request->estado);
        } else {
            $inquiriesQuery->whereIn('estado', ['Nueva', 'En Proceso', 'Finalizada']);
        }

        if ($request->filled('busqueda_consulta')) {
            $searchTermConsulta = strtolower($request->busqueda_consulta);
            $inquiriesQuery->where(function ($query) use ($searchTermConsulta) {
                $query->orWhereHas('cliente', function ($q) use ($searchTermConsulta) {
                    $q->whereRaw('LOWER(name) LIKE ?', ['%' . $searchTermConsulta . '%'])
                        ->orWhereRaw('LOWER(apellido) LIKE ?', ['%' . $searchTermConsulta . '%'])
                        ->orWhereRaw('LOWER(email) LIKE ?', ['%' . $searchTermConsulta . '%']);
                });
                $query->orWhereRaw('LOWER(titulo) LIKE ?', ['%' . $searchTermConsulta . '%'])
                    ->orWhereRaw('LOWER(tipo) LIKE ?', ['%' . $searchTermConsulta . '%']);
            });
        }

        $inquiries = $inquiriesQuery->with(['cliente', 'empleado'])
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        $consultasCount = Consulta::where('is_deleted', false)
            ->whereIn('estado', ['Nueva', 'En Proceso', 'Finalizada'])
            ->count();

        return view('dashboard.employee.clients', compact(
            'clients',
            'inquiries',
            'clientesCount',
            'consultasCount',
            'name',
            'role'
        ));
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
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $validated['imagen'] = basename($imagenPath);
        } else {
            $validated['imagen'] = 'icon-person.jpg';
        }

        $validated['password'] = bcrypt($validated['password']);
        $validated['rol'] = 'cliente';
        $validated['is_deleted'] = false;

        Usuario::create($validated);

        return redirect()->route('clientes')->with('success', 'Cliente creado correctamente.');
    }

    public function update(Request $request, Usuario $cliente)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:usuarios,dni,' . $cliente->id,
            'email' => 'required|email|max:255|unique:usuarios,email,' . $cliente->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($cliente->imagen && $cliente->imagen != 'icon-person.jpg') {
                Storage::disk('public')->delete('images/' . $cliente->imagen);
            }
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $validated['imagen'] = basename($imagenPath);
        }

        $cliente->update($validated);

        return redirect()->route('clientes')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Usuario $cliente)
    {
        $cliente->is_deleted = true;
        $cliente->save();
        return redirect()->route('clientes')->with('success', 'Cliente marcado como eliminado correctamente.');
    }
}
