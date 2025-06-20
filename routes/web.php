<?php

use App\Http\Controllers\PagoController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Auth;
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
    return redirect('/admin');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');


// rutas para configuraciones
//Route::get(uri: '/admin/configuracion', [App\Http\Controllers\ConfiguracionController::class,'index'])->name( name:'admin.configuracion.index')->middleware( middleware:'auth');
// rutas para configuraciones
Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name(name:'admin.configuraciones.index')->middleware('auth', 'can:admin.configuraciones.index');
Route::get('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'create'])->name(name:'admin.configuraciones.create')->middleware('auth', 'can:admin.configuraciones.create');
Route::post('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name(name:'admin.configuraciones.store')->middleware('auth','can:admin.configuraciones.store');
Route::get('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracionController::class, 'show'])->name(name:'admin.configuraciones.show')->middleware('auth','can:admin.configuraciones.show');
Route::get('/admin/configuraciones/{id}/edit', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('admin.configuraciones.edit')->middleware('auth','can:admin.configuraciones.edit');
Route::put('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('admin.configuraciones.update')->middleware('auth','can:admin.configuraciones.update');
Route::delete('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracionController::class, 'destroy'])->name('admin.configuraciones.destroy')->middleware('auth','can:admin.configuraciones.destroy');

// rutas para Roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name(name:'admin.roles.index')->middleware('auth','can:admin.roles.index');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name(name:'admin.roles.create')->middleware('auth','can:admin.roles.create');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name(name:'admin.roles.store')->middleware('auth','can:admin.roles.store');
Route::get('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name(name:'admin.roles.show')->middleware('auth','can:admin.roles.show');
Route::get('/admin/roles/{id}/asignar', [App\Http\Controllers\RoleController::class, 'asignar_roles'])->name(name:'admin.roles.asignar_roles')->middleware('auth','can:admin.roles.asignar_roles');
Route::put('/admin/roles/asignar/{id}', [App\Http\Controllers\RoleController::class, 'update_asignar'])->name(name:'admin.roles.update_asignar')->middleware('auth','can:admin.roles.update_asignar');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth','can:admin.roles.edit');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth','can:admin.roles.update');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth','can:admin.roles.destroy');

// rutas para los Usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name(name:'admin.usuarios.index')->middleware('auth','can:admin.usuarios.index');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name(name:'admin.usuarios.create')->middleware('auth','can:admin.usuarios.create');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name(name:'admin.usuarios.store')->middleware('auth','can:admin.usuarios.store');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name(name:'admin.usuarios.show')->middleware('auth','can:admin.usuarios.show');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth','can:admin.usuarios.edit');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth','can:admin.usuarios.update');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth','can:admin.usuarios.destroy');


// rutas para los Servicios
Route::get('/admin/servicios', [App\Http\Controllers\ServicioController::class, 'index'])->name(name:'admin.servicios.index')->middleware('auth','can:admin.servicios.index');
Route::get('/admin/servicios/create', [App\Http\Controllers\ServicioController::class, 'create'])->name(name:'admin.servicios.create')->middleware('auth','can:admin.servicios.create');
Route::post('/admin/servicios/create', [App\Http\Controllers\ServicioController::class, 'store'])->name(name:'admin.servicos.store')->middleware('auth','can:admin.servicios.store');
Route::get('/admin/servicios/{id}', [App\Http\Controllers\ServicioController::class, 'show'])->name(name:'admin.servicios.show')->middleware('auth','can:admin.servicios.show');
Route::get('/admin/servicios/{id}/edit', [App\Http\Controllers\ServicioController::class, 'edit'])->name('admin.servicios.edit')->middleware('auth','can:admin.servicios.edit');
Route::put('/admin/servicios/{id}', [App\Http\Controllers\ServicioController::class, 'update'])->name('admin.servicios.update')->middleware('auth','can:admin.servicios.update');
Route::delete('/admin/servicios/{id}', [App\Http\Controllers\ServicioController::class, 'destroy'])->name('admin.servicios.destroy')->middleware('auth','can:admin.servicios.destroy');

// rutas para los Clientes
Route::get('/admin/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name(name:'admin.clientes.index')->middleware('auth','can:admin.clientes.index');
Route::get('/admin/clientes2', [App\Http\Controllers\ClienteController::class, 'create'])->name(name:'admin.clientes.create')->middleware('auth','can:admin.clientes.create');
Route::post('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'store'])->name(name:'admin.clientes.store')->middleware('auth','can:admin.clientes.store');
Route::get('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'show'])->name(name:'admin.clientes.show')->middleware('auth','can:admin.clientes.show');
Route::get('/admin/clientes/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('admin.clientes.edit')->middleware('auth','can:admin.clientes.edit');
Route::put('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'update'])->name('admin.clientes.update')->middleware('auth','can:admin.clientes.update');
Route::delete('/admin/clientes/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('admin.clientes.destroy')->middleware('auth','can:admin.clientes.destroy');

// rutas para las solicitudes
Route::get('/admin/solicitud', [App\Http\Controllers\SolicitudController::class, 'index'])->name(name:'admin.solicitud.index')->middleware('auth','can:admin.solicitud.index');
Route::get('/admin/solicitud2', [App\Http\Controllers\SolicitudController::class, 'create'])->name(name:'admin.solicitud.create')->middleware('auth','can:admin.solicitud.create');

Route::get('/admin/solicitud/cliente/{id}', [App\Http\Controllers\SolicitudController::class, 'obtenerCliente'])->name(name:'admin.solicitud.cliente.obtenerCliente')->middleware('auth','can:admin.solicitud.cliente.obtenerCliente');
Route::get('/admin/solicitud/servicio/{id}', [App\Http\Controllers\SolicitudController::class, 'obtenerServicio'])->middleware('auth');

Route::post('/admin/solicitud/create', [App\Http\Controllers\SolicitudController::class, 'store'])->name(name:'admin.solicitud.store')->middleware('auth','can:admin.solicitud.store');

Route::delete('/admin/solicitud/{id}', [App\Http\Controllers\SolicitudController::class, 'destroy'])->name('admin.solicitud.destroy')->middleware('auth','can:admin.solicitud.destroy');

// rutas para los pagos 

//Route::get('/admin/pagos', [App\Http\Controllers\PagoController::class, 'create'])->name(name:'admin.pagos.create')->middleware('auth');


 //Route::get('/admin/solicitud/{id}/pago', [PagoController::class, 'createCliente'])->name('admin.pagos.create');

 //Route::get('/cliente/solicitudes/{id}/pago', [PagoController::class, 'createCliente'])->name('pagos.create');

