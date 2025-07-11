<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $name = $user->name;
        $role = $user->rol;

        $empleadosCount = Usuario::where('rol', 'empleado')->count();

        $query = Usuario::whereIn('rol', ['empleado', 'admin']);

        if ($request->has('busqueda') && $request->busqueda != '') {
            $busqueda = $request->busqueda;
            $query->where(function ($q) use ($busqueda) {
                $q->where('name', 'like', "%$busqueda%")
                    ->orWhere('apellido', 'like', "%$busqueda%")
                    ->orWhere('dni', 'like', "%$busqueda%");
            });
        }

        $employees = $query->get();
        $empleadosCount = Usuario::whereIn('rol', ['empleado', 'admin'])->count();

        return view('dashboard.employee.empleados', compact(
            'name',
            'role',
            'empleadosCount',
            'employees'
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
            'rol' => 'required|in:empleado,admin',
        ]);

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            if ($file->getError() == UPLOAD_ERR_INI_SIZE) {
                return back()->withErrors(['imagen' => 'La imagen excede el tamaño máximo permitido por el servidor.']);
            }
            $imagenPath = $file->store('images', 'public');
            $validated['imagen'] = basename($imagenPath);
        } else {
            $validated['imagen'] = 'icon-person.jpg';
        }

        $validated['password'] = bcrypt($validated['password']);
        $validated['is_deleted'] = false;

        Usuario::create($validated);

        return redirect()->route('empleados')->with('success', 'Empleado creado correctamente.');
    }

    public function update(Request $request, Usuario $empleado)
    {
        if (!in_array($empleado->rol, ['empleado', 'admin'])) {
            return redirect()->back()->with('error', 'Este usuario no puede ser editado.');
        }


        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:usuarios,dni,' . $empleado->id,
            'email' => 'required|email|max:255|unique:usuarios,email,' . $empleado->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'imagen' => 'nullable|image|max:2048',
            'rol' => 'required|in:admin,empleado',
        ]);

        if ($request->hasFile('imagen')) {
            if ($empleado->imagen && $empleado->imagen != 'icon-person.jpg') {
                Storage::disk('public')->delete('images/' . $empleado->imagen);
            }
            $imagenPath = $request->file('imagen')->store('images', 'public');
            $validated['imagen'] = basename($imagenPath);
        }

        $empleado->update($validated);

        return redirect()->route('empleados')->with('success', 'Empleado actualizado correctamente.');
    }



    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);

        if (!in_array($usuario->rol, ['empleado', 'admin'])) {
            return redirect()->back()->with('error', 'No se puede eliminar este usuario.');
        }

        $usuario->delete();

        return redirect()->route('empleados')->with('success', 'Usuario eliminado correctamente.');
    }
}
