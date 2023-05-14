<?php

use Illuminate\Support\Facades\Route;

//  _____      _          _____              _____                 _
// / ____|    | |        / ____|            / ____|               (_)
// | |    _   _| |_ _   _| |     __ _ _ __  | (___   ___ _ ____   ___  ___ ___
// | |   | | | | __| | | | |    / _` | '__|  \___ \ / _ \ '__\ \ / / |/ __/ _ \
// | |___| |_| | |_| |_| | |___| (_| | |     ____) |  __/ |   \ V /| | (_|  __/
// \_____\__,_|\__|\__,_|\_____\__,_|_|    |_____/ \___|_|    \_/ |_|\___\___|



Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('App\Http\Middleware\CheckAuth');


//Login
Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@logar');
Route::get('/deslogar', 'App\Http\Controllers\LoginController@deslogar')->name('deslogar');


//vagas
Route::get('/vagas', 'App\Http\Controllers\VagasController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/vagas', 'App\Http\Controllers\VagasController@cadastrar')->middleware('App\Http\Middleware\CheckAuth');

//clientes
Route::get('/clientes', 'App\Http\Controllers\ClienteController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/clientes', 'App\Http\Controllers\ClienteController@cadastrar')->middleware('App\Http\Middleware\CheckAuth');

//carros
Route::get('/carros', 'App\Http\Controllers\CarroController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/carros', 'App\Http\Controllers\CarroController@cadastrar')->middleware('App\Http\Middleware\CheckAuth');


//tickets
Route::get('/tickets/ativos', 'App\Http\Controllers\TicketController@listarAtivos')->name('tickets')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/tickets/todos', 'App\Http\Controllers\TicketController@listarTodos')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/ticket', 'App\Http\Controllers\TicketController@encerrar')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/ticket', 'App\Http\Controllers\TicketController@novo')->middleware('App\Http\Middleware\CheckAuth');

//Rotas de administrador
Route::get('/admin', 'App\Http\Controllers\AdminController@listar')->middleware('App\Http\Middleware\CheckAuth');
