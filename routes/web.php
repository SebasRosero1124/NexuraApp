<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FrontOfficeController::class, 'index'])->name('main');


//Ruta CRUD Empleados

Route::get('/Show/Empleados', [App\Http\Controllers\EmpleadoController::class,'show'])->name('lista_empleados');
Route::POST('/Guardar/Empleado', [App\Http\Controllers\EmpleadoController::class,'guardar'])->name('guardar.empleado');
Route::get('/Empleado/{id}/edit', [App\Http\Controllers\EmpleadoController::class,'edit'])->name('empleado_editar');
Route::PUT('/Empleado/{id}/Actualizar', [App\Http\Controllers\EmpleadoController::class,'update'])->name('actualizar_empleado');
Route::DELETE('/Empleado/{id}/Delete', [App\Http\Controllers\EmpleadoController::class,'destroy'])->name('empleado_eliminar');