<?php

use App\Http\Controllers\DepartController;
use App\Http\Controllers\EmpleController;
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

Route::get('/emple', [EmpleController::class, 'index']);

Route::get('/emple/create', [EmpleController::class, 'create']);

Route::post('/emple/store', [EmpleController::class, 'store']);


