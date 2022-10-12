<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/**
 * Route::get   (Consultar)
 * Route::post  (Guardar)
 * Route:delete (Eliminar)
 * Route:put    (Actualizar)
 */

 /* Al Index */
Route::get('/', function () {return view('index');})->name('index');

/* Autenticación de Usuario */
Auth::routes();

/* Al Home */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Al Formulario de Reserva */
Route::get('/cabaña1', function () 
{ return view('reserves'); });

/* Rutas Dashboard */

/* Al Resumen & Reportes   */
Route::get('/dashboard', function () {return view('resume');})->name('dashboard');

/* A mis Reservas */
Route::get('/dashboard/bookings', function () {return view('bookings');})->name('bookings');

/* Al Perfil */
Route::get('/dashboard/profile', function () {return view('profile');})->name('profile');

/*--------------------------------------------------------------------------------------------------------------*/
/*RUTAS CABAÑA*/

/* Listar Cabañas */
Route::get('/dashboard/cottages', [App\Http\Controllers\CottageController::class, 'show'])->name('cottages');

/* Crear Cabaña */
Route::post('/dashboard/cottages/create', [App\Http\Controllers\CottageController::class, 'create'])->name('cottage.create');

/* Borrar Cabaña */
Route::delete('/dashboard/{cottage}', [App\Http\Controllers\CottageController::class, 'destroy'])->name('cottage.destroy');

/* Editar Cabaña */
Route::put('/dashboard/{cottage}', [App\Http\Controllers\CottageController::class, 'update'])->name('cottage.update');

/*FIN RUTAS CABAÑA*/
/*--------------------------------------------------------------------------------------------------------------*/

/* A Lista de Servicios */
Route::get('/dashboard/services', function () {return view('services');})->name('services');



