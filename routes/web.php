<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Profilecontroller;
use App\Http\Controllers\CottageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TransbankController;
use App\Http\Controllers\AdminController;
use App\Models\Detail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
Route::get('/prelogin', function(){return view('auth.login');})->name('prelogin');
Route::get('/validateEmail', [ProfileController::class, 'validateEmail']);
Route::ANY('/userStore', [RegisterController::class, 'userStore'])->name('userStore');
/*------------------------------------------------------------------------------------------------------------------------*/

/* RUTAS DEl HOME */

/* Al Home */
Route::get('/home', [HomeController::class, 'show'])->name('home');

/* Al formulario de reserva */
Route::get('/cabaña2', function () { return view('reserves'); });
/*------------------------------------------------------------------------------------------------------------------------*/

/* A Pasarela de Pago   */
Route::post('/detail/{cottage}', [DetailController::class, 'show'])->name('detail');
Route::get("/compra/status",[TransbankController::class,'showStatus']);
Route::group(['middleware' => 'auth'], function () {
/* RUTAS DEL DASHBOARD */
/*------------------------------------------------------------------------------------------------------------------------*/
/* RUTAS DE REPORTES */

/* Al Dashboard   */
Route::get('/dashboard/resumen', [AdminController::class, 'index'])->name('resumen');
Route::resource('reservations', ReservationController::class);
Route::get('/client/index', [ ReservationController::class, 'clients'])->name('admin.index');
Route::post('/client/cancelar/{id}', [ ReservationController::class, 'cancelar'])->name('admin.cancelar');
Route::get('/dashboard', function(){return view('dashboard');})->name('dashboard');


/*------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------*/
/* RUTAS DE MIS RESERVAS */

/* Listar mis Reservas */
Route::get('/dashboard/bookings', function () {return view('bookings');})->name('bookings');
/*------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------*/


/* RUTAS PERFIL DE USUARIO */

/* Listar Perfil */
Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');

/* Editar Perfil */
Route::put('/dashboard/update/{profile}', [ProfileController::class, 'update'])->name('profile.update');
/*------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------*/


/* RUTAS CABAÑAS */

/* Listar Cabañas */
Route::get('/dashboard/cottages/show', [CottageController::class, 'show'])->name('cottages');

/* Crear Cabaña */
Route::post('/dashboard/cottage/create', [CottageController::class, 'create'])->name('cottage.create');

/* Borrar Cabaña */
Route::delete('/dashboard/cottage/delete', [CottageController::class, 'destroy'])->name('cottage.destroy');

/* Editar Cabaña */
Route::post('/dashboard/cottage/update', [CottageController::class, 'update'])->name('cottage.update');
/*------------------------------------------------------------------------------------------------------------------------*/

/*------------------------------------------------------------------------------------------------------------------------*/


/* RUTAS SERVICIOS */

/* Listar Servicios */
Route::get('/dashboard/services/show', [ServiceController::class, 'show'])->name('services');

/* Crear Servicio */
Route::post('/dashboard/service/create', [ServiceController::class, 'create'])->name('service.create');

/* Borrar Servicio */
Route::delete('/dashboard/service/{service}', [ServiceController::class, 'destroy'])->name('service.destroy');

/* Editar Servicio */
Route::put('/dashboard/service/{service}', [ServiceController::class, 'update'])->name('service.update');
/*------------------------------------------------------------------------------------------------------------------------*/
/*------------------------------------------------------------------------------------------------------------------------*/
});