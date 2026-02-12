<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GeolocalizacionController;
use App\Http\Controllers\ProductosController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\Clientes;

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

Route::get('/inicio', function () {
    return view('/Inicio/inicio');
})->name('inicio');

Route::get('/ingresar', function () {
    return view('/Ingresar/login');
})->name('ingresar');

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/cliente/listado',[ClientesController::class,'index']);
Route::get('/empleado/listado',[EmpleadoController::class,'index']);
Route::get('/categoria/listado',[CategoriaController::class,'index']);

Route::get('/cliente/registro',[ClientesController::class,'create']);
Route::post('/cliente/store',[ClientesController::class,'store']);

Route::get('/empleado/registro',[EmpleadoController::class,'create']);
Route::post('/empleado/store',[EmpleadoController::class,'store']);

Route::get('/categoria/registro',[CategoriaController::class,'create']);
Route::post('/categoria/store',[CategoriaController::class,'store']);


//Rutas de actualizacion
//Categoria
Route::get('/categoria/{id}/actualizar',[CategoriaController::class,'edit']);
Route::post('/categoria/{id}/actualizar',[CategoriaController::class,'update']);


//Empleado
Route::get('/empleado/{id}/actualizar',[EmpleadoController::class,'edit']);
Route::post('/empleado/{id}/actualizar',[EmpleadoController::class,'update']);

//Cliente
Route::get('/cliente/{id}/actualizar',[ClientesController::class,'edit']);
Route::post('/cliente/{id}/actualizar',[ClientesController::class,'update']);


//Rutas de eliminacion
Route::delete('/cliente/{id}/eliminar',[ClientesController::class,'destroy']);
Route::delete('/empleado/{id}/eliminar',[EmpleadoController::class,'destroy']);

Route::get('/geolocalizacion', [GeolocalizacionController::class, 'index']);

Route::get('/auth/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        // Buscar cliente por correo
        $cliente = Clientes::where('correo', $googleUser->getEmail())->first();

        // Si no existe, crearlo
        if (!$cliente) {

            $nombreCompleto = explode(' ', $googleUser->getName(), 2);

            $cliente = Clientes::create([
                'nombre'     => $nombreCompleto[0],
                'apellido'   => $nombreCompleto[1] ?? '',
                'correo'     => $googleUser->getEmail(),
                'contrasena' => bcrypt(uniqid()), 
                'estado'     => 'Activo',
            ]);
        }

        // Iniciar sesión
        Auth::login($cliente);

        // Redirigir a ruta
        return redirect('/inicio');

    } catch (Exception $e) {
        return redirect('/ingresar');
    }
});

Route::get('/producto/listado', [ProductosController::class, 'index']);
Route::get('/producto/registro', [ProductosController::class, 'create']);
Route::post('/producto/guardar', [ProductosController::class, 'store']);
Route::get('/producto/editar/{id}', [ProductosController::class, 'edit']);
Route::put('/producto/actualizar/{id}', [ProductosController::class, 'update']);
Route::delete('/producto/eliminar/{id}', [ProductosController::class, 'destroy']);