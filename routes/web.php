<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FabricaController;
use Illuminate\Support\Facades\Route;

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
//RUTAS PARA LA FABRICA
Route::get('/fabrica', [FabricaController::class, 'index']);
Route::post('/fabrica', [FabricaController::class, 'store']);
Route::delete('/fabrica/{id}', [FabricaController::class, 'eliminar']);

//RUTAS PARA EL EMPLEADO
Route::get('/empleado', [EmpleadoController::class, 'index']);
Route::post('/empleado', [EmpleadoController::class, 'store']);
Route::delete('/empleado/{id}',[EmpleadoController::class, 'eliminar'] );
Route::get('/empleado/{id}', [EmpleadoController::class, 'showempleado']);
Route::put('/empleado/{id}', [EmpleadoController::class, 'actualizar']);