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
}
