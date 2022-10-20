<?php

use App\Http\Controllers\IndexController;
use App\Models\Cottage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
 * Route::get   (Consultar)
 * Route::post  (Guardar)
 * Route:delete (Eliminar)
 * Route:put    (Actualizar)
 */

/* Al Index */
Route::get('/', [IndexController::class, 'show'])->name('index');

/* Autenticación de Usuario */
Auth::routes();
Route::get('/validateEmail', [App\Http\Controllers\ProfileController::class, 'validateEmail']);
Route::post('/userStore', [App\Http\Controllers\Auth\RegisterController::class, 'userStore']);
/*------------------------------------------------------------------------------------------------------------------------*/

/* RUTAS DEl HOME */

/* Al Home */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'show'])->name('home');

/* Al formulario de reserva */
Route::get('/cabaña1', function () { return view('reserves'); });
/*------------------------------------------------------------------------------------------------------------------------*/


/* RUTAS DEL DASHBOARD */
/*------------------------------------------------------------------------------------------------------------------------*/
/* RUTAS DE REPORTES */

/* Al Resumen & Reportes   */
Route::get('/dashboard', function () {return view('resume');})->name('dashboard');
/*------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------*/
/* RUTAS DE MIS RESERVAS */

/* Listar mis Reservas */
Route::get('/dashboard/bookings', function () {return view('bookings');})->name('bookings');
/*------------------------------------------------------------------------------------------------------------------------*/

Route::post('/booking', [App\Http\Controllers\BookingController::class, 'create'])->name('cottage.booking');
/*------------------------------------------------------------------------------------------------------------------------*/
/* RUTAS PERFIL DE USUARIO */

/* Listar Datos de Perfil */
Route::get('/dashboard/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
/*------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------*/
/* RUTAS CABAÑAS */

/* Listar Cabañas */
Route::get('/dashboard/cottages', [App\Http\Controllers\CottageController::class, 'show'])->name('cottages');

/* Crear Cabaña */
Route::post('/dashboard/cottages/create', [App\Http\Controllers\CottageController::class, 'create'])->name('cottage.create');

/* Borrar Cabaña */
Route::delete('/dashboard/{cottage}', [App\Http\Controllers\CottageController::class, 'destroy'])->name('cottage.destroy');

/* Editar Cabaña */
Route::put('/dashboard/{cottage}', [App\Http\Controllers\CottageController::class, 'update'])->name('cottage.update');
/*------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------*/
/* RUTAS SERVICIOS */

/* A Lista de Servicios */
Route::get('/dashboard/services', function () {return view('services');})->name('services');
/*------------------------------------------------------------------------------------------------------------------------*/
