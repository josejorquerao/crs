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
/* Al Dashboard   */
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

/* Autenticación de Usuario */
Auth::routes();

/* Al Home */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* A mis Reservas */
Route::get('/dashboard/bookings', function () {return view('bookings');})->name('bookings');

/* Al Perfil */
Route::get('/dashboard/profile', function () {return view('profile');})->name('profile');

/* A Lista de Cabañas */
Route::get('/dashboard/cottages', [App\Http\Controllers\CottageController::class, 'index'])->name('cottages');

/*¨Crear Cabaña */
Route::post('/dashboard/cottages/create', [App\Http\Controllers\CottageController::class, 'store'])->name('cottage.create');

/* A Lista de Servicios */
Route::get('/dashboard/services', function () {return view('services');})->name('services');


/* Al Formulario de Reserva */
Route::get('/cabaña1', function () 
{ return view('reserves'); });
