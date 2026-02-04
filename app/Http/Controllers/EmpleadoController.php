<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    public function index()
{
    $empleados = Empleado::all();
    return view('/Empleado/listado-empleado')-> with('empleados', $empleados);
}

    public function create()
    {

        return view('Empleado/registro-empleado');
    }
    
    public function store(Request $req)
    {
        //return $req->all();
        $empleado = new Empleado();
        $empleado->nombre = $req->nombre;
        $empleado->apellido = $req->apellido;
        $empleado->usuario = $req->usuario;
        $empleado->correo = $req->correo;
        $empleado->contrasena = $req->contrasena;
        $empleado->rol = $req->rol;
        $empleado->estado = $req->estado;
        $empleado->save();
        return redirect('/empleado/listado');
    }
    public function edit($id)
    {
        $empleados = Empleado::find($id);
        return view('Empleado/registro-actualizar-empleado')-> with('empleados',$empleados);
    }
    public function update(Request $req, $id)
    {
        
        $empleado = Empleado::find($id);
        $empleado->nombre = $req->nombre;
        $empleado->apellido = $req->apellido;
        $empleado->usuario = $req->usuario;
        $empleado->correo = $req->correo;
        $empleado->contrasena = $req->contrasena;
        $empleado->rol = $req->rol;
        $empleado->estado = $req->estado;
        $empleado->save();
        return redirect('/empleado/listado');
    }
}
