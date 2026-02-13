<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolEmpleado
{
    public function handle(Request $request, Closure $next, $rol)
    {
        $empleado = Auth::guard('empleado')->user();

        if (!$empleado || $empleado->rol !== $rol) {
            abort(403, 'No tienes permiso para acceder a esta sección');
        }

        return $next($request);
    }
}

