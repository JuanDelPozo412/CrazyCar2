<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Consulta;
use Illuminate\Support\Facades\Storage;
use App\Models\Usuario;

class ProfileController extends Controller
{
    public function show(Request $request): View
    {
        $user = $request->user();
        $consultas = $user->consultas()->latest()->get();
        $vehiculos = $user->vehiculos;

        return view('profile.show', [
            'user' => $user,
            'consultas' => $consultas,
            'vehiculos' => $vehiculos,
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function createForClient()
    {

        return view('profile.create-consulta-cliente');
    }

    public function storeConsultaCliente(Request $request)
    {
        $authenticatedUser = Auth::user();

        if ($authenticatedUser->rol !== 'cliente') {
            return redirect()->back()->with('error', 'Acción no autorizada. Solo los clientes pueden crear consultas desde su perfil.');
        }

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

        $consulta->usuario_id = $authenticatedUser->id;
        $consulta->empleado_id = null;
        $consulta->estado = 'Nueva';

        $consulta->save();

        return redirect()->route('clientes')->with('success', 'Consulta creada correctamente y en espera de ser procesada.');
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        $user = $request->user();


        $user->fill($request->validated());


        if ($request->hasFile('imagen')) {
            if ($user->imagen) {
                Storage::disk('public')->delete('images/' . $user->imagen);
            }
            $path = $request->file('imagen')->store('images', 'public');
            $user->imagen = basename($path);
        }



        if ($user->isDirty('email')) {
            $user->email = $user->getOriginal('email');
        }


        $user->save();

        return Redirect::route('profile.edit')->with('status', '¡Perfil actualizado con éxito!');
    }

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
