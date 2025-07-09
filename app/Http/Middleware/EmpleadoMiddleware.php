<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpleadoMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && in_array(Auth::user()->rol, ['empleado', 'admin'])) {
            return $next($request);
        }

        return redirect()->route('cliente.perfil');
    }
}
