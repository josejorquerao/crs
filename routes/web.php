<?php

use Illuminate\Support\Facades\Route;

/**
 * Route::get   (Consultar)
 * Route::post  (Guardar)
 * Route:delete (Eliminar)
 * Route:put    (Actualizar)
 */
Route::get('/', function () {
    return view('index');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/cabaña1', function () 
{ return view('reserves'); });
