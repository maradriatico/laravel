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

Route::post('/depart', [DepartController::class, 'store']);