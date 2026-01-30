<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;

class ClientesController extends Controller
{
    //

    public function index()
{
	$clientes = Clientes::all();
	return view('/Clientes/listado-clientes')-> with('clientes', $clientes);

}
    public function create()
    {

        return view('Clientes/registro-clientes');
    }
    
    public function store(Request $req)
    {
        
        $cliente = new Clientes();
        $cliente->nombre = $req->nombre;
        $cliente->apellido = $req->apellido;
        $cliente->correo = $req->correo;
        $cliente->contrasena = $req->contrasena;
        $cliente->estado = $req->estado;
        $cliente->save();
        return redirect('/cliente/listado');
    }
}