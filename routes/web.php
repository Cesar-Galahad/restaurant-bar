<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/flow','flowbite');
Route::get('/cliente/listado',[ClientesController::class,'index']);
Route::get('/empleado/listado',[EmpleadoController::class,'index']);
Route::get('/categoria/listado',[CategoriaController::class,'index']);
Route::get('/cliente/registro',[ClientesController::class,'create']);
Route::post('/cliente/store',[ClientesController::class,'store']);