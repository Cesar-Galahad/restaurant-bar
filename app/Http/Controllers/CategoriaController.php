<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('Categoria/listado-categoria')-> with('categorias', $categorias);
    }
    public function create()
    {
        return view('Categoria/registro-categoria');
    }
    public function store(Request $req)
    {
        $categoria = new Categoria();
        $categoria->nombre = $req->nombre;
        $categoria->descripcion = $req->descripcion;
        $categoria->estado = $req->estado;
        $categoria->save();
        return redirect('/categoria/listado');
    }
}
