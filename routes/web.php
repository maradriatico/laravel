<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\DepartController;
use App\Http\Controllers\EmpleController;
use App\Http\Controllers\UsuariosController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/depart', [DepartController::class, 'index']);

Route::get('/depart/create', [DepartController::class, 'create']);

Route::post('/depart', [DepartController::class, 'store'])
    ->name('depart.store');

Route::get('/depart/{id}/edit', [DepartController::class, 'edit']);
Route::put('/depart/{id}', [DepartController::class, 'update'])
    ->name('depart.update');

Route::get('/emple', [EmpleController::class, 'index']);

Route::get('/emple/create', [EmpleController::class, 'create']);

Route::post('/emple', [EmpleController::class, 'store'])
    ->name('emple.store');

//Route::get('/emple/{id}', [EmpleController::class, 'show'])->where('id', '[0-9]+');

Route::get('/emple/{id}/edit', [EmpleController::class, 'edit']);
Route::put('/emple/{id}', [EmpleController::class, 'update'])
    ->name('emple.update');

Route::delete('/emple/{id}', [EmpleController::class, 'destroy']);

Route::get('/login', [UsuariosController::class, 'loginForm']);
Route::post('/login', [UsuariosController::class, 'login']);
Route::get('/logout', [UsuariosController::class, 'logout']);


Route::get('/alumnos', [AlumnosController::class, 'index']);
Route::get('/alumnos/create', [AlumnosController::class, 'create']);
Route::post('/alumnos', [AlumnosController::class, 'store'])
    ->name('alumnos.store');

Route::get('/alumnos/{id}/edit', [AlumnosController::class, 'edit']);
Route::put('/alumnos/{id}', [AlumnosController::class, 'update'])
    ->name('alumnos.update');

Route::delete('/alumnos/{id}', [AlumnosController::class, 'destroy']);

Route::get('/alumnos/criterios/{id}', [AlumnosController::class, 'actividad']);

Route::get('/alumnos/index', [AlumnosController::class, 'final']);
