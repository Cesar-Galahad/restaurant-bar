<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GeolocalizacionController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\EmpleadoAuthController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\Empleado;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('/Ingresar/login');
})->name('ingresar');

Route::post('/login', [EmpleadoAuthController::class, 'login'])
    ->name('empleado.login');

Route::post('/logout', [EmpleadoAuthController::class, 'logout'])
    ->name('empleado.logout');

/*
|--------------------------------------------------------------------------
| Google Login
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();

        $empleado = Empleado::where('correo', $googleUser->getEmail())->first();

        if (!$empleado) {
            $nombreCompleto = explode(' ', $googleUser->getName(), 2);

            $empleado = Empleado::create([
                'nombre'     => $nombreCompleto[0],
                'apellido'   => $nombreCompleto[1] ?? '',
                'usuario'    => $googleUser->getEmail(),
                'correo'     => $googleUser->getEmail(),
                'contrasena' => bcrypt(uniqid()),
                'rol'        => 'Administrador',
                'estado'     => 'Activo',
            ]);
        }

        Auth::guard('empleado')->login($empleado);
        return redirect('/inicio');

    } catch (Exception $e) {
        return redirect('/');
    }
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas (solo login)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:empleado')->group(function () {

    Route::get('/inicio', function () {
        return view('/Inicio/inicio');
    })->name('inicio');

    // LISTADOS
    Route::get('/cliente/listado',[ClientesController::class,'index']);
    Route::get('/empleado/listado',[EmpleadoController::class,'index']);
    Route::get('/categoria/listado',[CategoriaController::class,'index']);
    Route::get('/producto/listado',[ProductosController::class,'index']);

    // REGISTROS
    Route::get('/cliente/registro',[ClientesController::class,'create']);
    Route::post('/cliente/store',[ClientesController::class,'store']);

    Route::get('/empleado/registro',[EmpleadoController::class,'create']);
    Route::post('/empleado/store',[EmpleadoController::class,'store']);

    Route::get('/categoria/registro',[CategoriaController::class,'create']);
    Route::post('/categoria/store',[CategoriaController::class,'store']);

    Route::get('/producto/registro',[ProductosController::class,'create']);
    Route::post('/producto/guardar',[ProductosController::class,'store']);

    // ACTUALIZAR
    Route::get('/categoria/{id}/actualizar',[CategoriaController::class,'edit']);
    Route::post('/categoria/{id}/actualizar',[CategoriaController::class,'update']);

    Route::get('/empleado/{id}/actualizar',[EmpleadoController::class,'edit']);
    Route::post('/empleado/{id}/actualizar',[EmpleadoController::class,'update']);

    Route::get('/cliente/{id}/actualizar',[ClientesController::class,'edit']);
    Route::post('/cliente/{id}/actualizar',[ClientesController::class,'update']);

    // ELIMINAR
    Route::delete('/cliente/{id}/eliminar',[ClientesController::class,'destroy']);
    Route::delete('/empleado/{id}/eliminar',[EmpleadoController::class,'destroy']);

    Route::get('/geolocalizacion',[GeolocalizacionController::class,'index']);
});
