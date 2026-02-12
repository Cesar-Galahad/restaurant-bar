<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Categoria;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        return view('Productos/listado-productos')
                ->with('productos', $productos);
    }

    public function create()
    {
        $categorias = Categoria::all(); 
        return view('Productos/registro-productos')
                ->with('categorias', $categorias);
    }

    public function store(Request $req)
    {
        $producto = new Productos();

        $producto->nombre = $req->nombre;
        $producto->descripcion = $req->descripcion;
        $producto->precio = $req->precio;
        $producto->existencia = $req->existencia;
        $producto->estado = $req->estado;
        $producto->categoria_id = $req->categoria_id;

        if($req->hasFile('imagen')){
            $ruta = $req->file('imagen')->store('imagenes','public');
            $producto->imagen = $ruta;
        }

        $producto->save();

        return redirect('/producto/listado');
    }

    public function edit($id)
    {
        $producto = Productos::find($id);
        $categorias = Categoria::all();

        return view('Productos/registro-actualizar-productos')
                ->with('producto', $producto)
                ->with('categorias', $categorias);
    }

    public function update(Request $req, $id)
    {
        $producto = Productos::find($id);

        $producto->nombre = $req->nombre;
        $producto->descripcion = $req->descripcion;
        $producto->precio = $req->precio;
        $producto->existencia = $req->existencia;
        $producto->estado = $req->estado;
        $producto->categoria_id = $req->categoria_id;

        if($req->hasFile('imagen')){
            $ruta = $req->file('imagen')->store('imagenes','public');
            $producto->imagen = $ruta;
        }

        $producto->save();

        return redirect('/producto/listado');
    }

    public function destroy($id)
    {
        $producto = Productos::find($id);
        $producto->delete();

        return redirect('/producto/listado');
    }
}