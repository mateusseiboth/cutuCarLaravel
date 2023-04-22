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
});

Route::get('/vagas', 'App\Http\Controllers\VagasController@listar');
Route::get('/clientes', 'App\Http\Controllers\ClienteController@listar');
Route::get('/carros', 'App\Http\Controllers\CarroController@listar');
Route::get('/tickets/ativos', 'App\Http\Controllers\TicketController@listarAtivos');
Route::get('/tickets/todos', 'App\Http\Controllers\TicketController@listarTodos');


Route::get('/admin', function() {
    return view('adminPanel');
});
