<?php

namespace App\Http\Controllers;

use App\Models\Usuario; // Asegúrate de que esta línea esté presente
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // Para la validación 'unique' en update
use Illuminate\Support\Facades\Hash; // Para hashear contraseñas si no lo hace el modelo automáticamente
use Illuminate\Http\RedirectResponse; // Para los retornos de redirección
use Illuminate\View\View; // Para los retornos de vista

class UsuarioController extends Controller
{
    public function mostrarUsuarios(): View
    {
       
        $usuarios = Usuario::all(); 
        return view('usuarios.index', compact('usuarios'));
    }

  
    public function Form(): View
    {
        // Retorna la vista con el formulario para crear un nuevo usuario
        return view('usuarios.create');
        // Asegúrate de crear un archivo 'create.blade.php' en 'resources/views/usuarios/'
    }

    /**
     * Almacena un recurso recién creado en el almacenamiento (base de datos).
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validar los datos de la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email', // 'unique:nombre_tabla,nombre_columna'
            'password' => 'required|string|min:8|confirmed', // 'confirmed' busca un campo 'password_confirmation'
        ]);

        // 2. Crear un nuevo usuario en la base de datos
        // Asegúrate de que estos campos estén en el $fillable de tu modelo Usuario
        Usuario::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password), // ¡Importante hashear la contraseña!
                                                           // Si tu modelo Usuario extiende Authenticatable, Laravel puede hashearlo automáticamente.
        ]);

        // 3. Redirigir a una página de éxito, por ejemplo, el índice de usuarios
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Muestra el recurso (usuario) especificado.
     * La inyección de modelo (Usuario $usuario) automáticamente encuentra el usuario por ID de la ruta.
     */
    public function show(Usuario $usuario): View
    {
        // Retorna la vista mostrando los detalles del usuario
        return view('usuarios.show', compact('usuario'));
        // Asegúrate de crear un archivo 'show.blade.php' en 'resources/views/usuarios/'
    }


    public function edit(Usuario $usuario): View
    {
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Actualiza el recurso (usuario) especificado en el almacenamiento (base de datos).
     */
    public function update(Request $request, Usuario $usuario): RedirectResponse
    {
        // 1. Validar los datos de la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            [
                Rule::unique('usuarios', 'email')->ignore($usuario->id),
            ],
            'password' => 'nullable|string|min:8|confirmed', 
        ]);
        $usuario->fill($request->except('password')); 
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuario $usuario): RedirectResponse
    {
        // Eliminar el usuario
        $usuario->delete();

        // Redirigir al índice de usuarios con un mensaje
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}