<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('Categoria/listado-categoria')->with('categorias', $categorias);
    }

    public function create()
    {
        return view('Categoria/registro-categoria');
    }

    public function store(Request $req)
    {
        $categoria = new Categoria();
        $categoria->nombre = $req->nombre;

       $categoria->imagen = 'imagenes/categorias/categorias_default.jpg'.$nombreImagen;

        $categoria->save();
        
        if ($req -> has ('imagen'))
            {
                $imagen = $req -> imagen;
                $nuevo_nombre = 'categorias_'.$categoria->id .'.jpg';
                $ruta = $imagen -> storeAs('imagenes/categorias', $nuevo_nombre, 'public');
                $categoria -> imagen = '/storage'.$ruta;
                $categoria -> save();
            }
            return redirect('/categoria/listado');
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('Categoria/registro-actualizar-categoria')->with('categoria', $categoria);
    }

    public function update(Request $req, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $req->nombre;

        /*if ($req->hasFile('imagen')) {
            $file = $req->file('imagen');
            $nombreImagen = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('imagenes/categorias'), $nombreImagen);
            $categoria->imagen = $nombreImagen;
        }
            */
        if ($req -> has ('imagen'))
            {
                $imagen = $req -> imagen;
                $nuevo_nombre = 'categorias_'.$categoria->id .'.jpg';
                $ruta = $imagen -> storeAs('imagenes/categorias', $nuevo_nombre, 'public');
                $categoria -> imagen = '/storage'.$ruta;
                $categoria -> save();
            }

        $categoria->save();
        return redirect('/categoria/listado');
    }

    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect('/categoria/listado');
    }
}
