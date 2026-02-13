<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmpleadoAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasena' => 'required'
        ]);

        $credenciales = [
            'correo' => $request->correo,
            'password' => $request->contrasena,
            'estado' => 'Activo'
        ];

        if (Auth::guard('empleado')->attempt($credenciales)) {

            $request->session()->regenerate();

            return redirect()->route('inicio');
        }

        return back()->with('error', 'Credenciales incorrectas o empleado inactivo');
    }

    public function logout(Request $request)
    {
        Auth::guard('empleado')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

