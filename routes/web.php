<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PersonajeController;


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

//API Noticias
Route::get('mostrar', [AppController::class, 'mostrar'])->name('mostrar');
Route::get('leer', [AppController::class, 'leer'])->name('leer');

//Front-end
Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('personajes', [AppController::class, 'personajes'])->name('personajes');
Route::get('personaje/{slug}', [AppController::class, 'personaje'])->name('personaje');
Route::get('acerca-de', [AppController::class, 'acercade'])->name('acerca-de');

//Back-end
Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('admin/usuarios', [UsuarioController::class, 'index'])->middleware('role:usuarios');
Route::get('admin/usuarios/crear', [UsuarioController::class, 'crear'])->middleware('role:usuarios');
Route::post('admin/usuarios/guardar', [UsuarioController::class, 'guardar'])->middleware('role:usuarios');
Route::get('admin/usuarios/editar/{id}', [UsuarioController::class, 'editar'])->middleware('role:usuarios');
Route::post('admin/usuarios/actualizar/{id}', [UsuarioController::class, 'actualizar'])->middleware('role:usuarios');
Route::get('admin/usuarios/activar/{id}', [UsuarioController::class, 'activar'])->middleware('role:usuarios');
Route::get('admin/usuarios/borrar/{id}', [UsuarioController::class, 'borrar'])->middleware('role:usuarios');

//Back-end
Route::get('admin', [AdminController::class, 'index'])->name('admin');
Route::get('admin/personajes', [PersonajeController::class, 'index'])->middleware('role:personajes');
Route::get('admin/personajes/crear', [PersonajeController::class, 'crear'])->middleware('role:personajes');
Route::post('admin/personajes/guardar', [PersonajeController::class, 'guardar'])->middleware('role:personajes');
Route::get('admin/personajes/editar/{id}', [PersonajeController::class, 'editar'])->middleware('role:personajes');
Route::post('admin/personajes/actualizar/{id}', [PersonajeController::class, 'actualizar'])->middleware('role:personajes');
Route::get('admin/personajes/activar/{id}', [PersonajeController::class, 'activar'])->middleware('role:personajes');
Route::get('admin/personajes/home/{id}', [PersonajeController::class, 'home'])->middleware('role:personajes');
Route::get('admin/personajes/borrar/{id}', [PersonajeController::class, 'borrar'])->middleware('role:personajes');

//Auth
Route::get('email', [AuthController::class, 'email'])->name('email');
Route::get('acceder', [AuthController::class, 'acceder'])->name('acceder');
Route::post('autenticar', [AuthController::class, 'autenticar'])->name('autenticar');
Route::get('registro', [AuthController::class, 'registro'])->name('registro');
Route::post('registrarse', [AuthController::class, 'registrarse'])->name('registrarse');
Route::post('salir', [AuthController::class, 'salir'])->name('salir');

Route::post('enlace', [AuthController::class, 'enlace'])->name('enlace');
Route::get('clave/{token}', [AuthController::class, 'clave'])->name('clave');
Route::post('cambiar', [AuthController::class, 'cambiar'])->name('cambiar');

//Ruta por defecto (si no encuentra otra antes)
Route::any('{query}', function() { return redirect('/'); })->where('query', '.*');
