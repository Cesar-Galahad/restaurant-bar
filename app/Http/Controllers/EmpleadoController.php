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

        $empleado->imagen = 'imagenes/empleado/empleado_default.jpg'.$nombreImagen;

        $empleado->save();
        
        if ($req -> has ('imagen'))
            {
                $imagen = $req -> imagen;
                $nuevo_nombre = 'empleados_'.$empleado->id .'.jpg';
                $ruta = $imagen -> storeAs('imagenes/empleado', $nuevo_nombre, 'public');
                $empleado -> imagen = '/storage'.$ruta;
                $empleado -> save();
            }
            
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
        
        if ($req->hasFile('imagen')) {

        $imagen = $req->file('imagen');
        $nuevo_nombre = 'empleados_'.$empleado->id.'.'.$imagen->extension();
        $ruta = $imagen->storeAs('imagenes/empleado', $nuevo_nombre, 'public');
        $empleado->imagen = 'storage/'.$ruta;
    }


    $empleado->save();

    return redirect('/empleado/listado');
    }
    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect('/empleado/listado');
    }
}
