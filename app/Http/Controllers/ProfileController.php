<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage; // Importante para manejar archivos
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile view.
     */
    public function show(Request $request): View
    {
        $user = $request->user();
        $consultas = $user->consultas()->latest()->get();
        
        return view('profile.show', [
            'user' => $user,
            'consultas' => $consultas,
        ]);
    }

    /**
     * Display the user's profile edit form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // 1. Obtenemos el usuario
        $user = $request->user();
        
        // 2. Llenamos el modelo del usuario con los datos validados del ProfileUpdateRequest
        //    (Para que esto funcione, debemos actualizar ese archivo -> Ver Paso 2)
        $user->fill($request->validated());
        
        // 3. Verificamos si se subió una nueva foto de perfil
        if ($request->hasFile('avatar')) {
            // Opcional: Borra la foto anterior para no guardar basura en el servidor
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            // Guarda la nueva foto en 'storage/app/public/avatars' y guarda la ruta en la DB
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->profile_photo_path = $path;
        }

        // 4. El email no se puede cambiar, así que nos aseguramos de que no se modifique
        //    y reseteamos cualquier cambio accidental.
        if ($user->isDirty('email')) {
            $user->email = $user->getOriginal('email'); 
        }

        // 5. Guardamos todos los cambios en la base de datos
        $user->save();

        // 6. Redirigimos de vuelta con un mensaje de éxito
        return Redirect::route('profile.edit')->with('status', '¡Perfil actualizado con éxito!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}