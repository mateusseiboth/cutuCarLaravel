<?php

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
    return view('welcome');
})->name('home')->middleware('App\Http\Middleware\CheckAuth');

Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('/deslogar', 'App\Http\Controllers\LoginController@deslogar')->name('deslogar');
Route::post('/login', 'App\Http\Controllers\LoginController@logar');

Route::get('/vagas', 'App\Http\Controllers\VagasController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/clientes', 'App\Http\Controllers\ClienteController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/carros', 'App\Http\Controllers\CarroController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/tickets/ativos', 'App\Http\Controllers\TicketController@listarAtivos')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/tickets/todos', 'App\Http\Controllers\TicketController@listarTodos')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/admin', 'App\Http\Controllers\AdminController@listar')->middleware('App\Http\Middleware\CheckAuth');
