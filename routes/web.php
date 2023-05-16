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

// Login
Route::get('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@logar');
Route::get('/deslogar', 'App\Http\Controllers\LoginController@deslogar')->name('deslogar');

//Dashboard
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->middleware('App\Http\Middleware\CheckAuth');

// Vagas
Route::get('/vagas', 'App\Http\Controllers\VagasController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/vagas', 'App\Http\Controllers\VagasController@novo');
Route::delete('/vagas/{id}', 'App\Http\Controllers\VagasController@deletar')->name('vagas.delete')->middleware('App\Http\Middleware\CheckAuth');

// Clientes
Route::get('/clientes', 'App\Http\Controllers\ClienteController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/clientes/criar', 'App\Http\Controllers\ClienteController@criarCliente')->name('criar-cliente')->middleware('App\Http\Middleware\CheckAuth');
Route::put('/cliente/{id}/alterar-estado', 'App\Http\Controllers\ClienteController@alterarEstadoCliente')->name('alterar-estado-cliente')->middleware('App\Http\Middleware\CheckAuth');
Route::put('/cliente/{id}/editar', 'App\Http\Controllers\ClienteController@editarCliente')->name('editar-cliente')->middleware('App\Http\Middleware\CheckAuth');

// Carros
Route::get('/carros', 'App\Http\Controllers\CarroController@listar')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/carros', 'App\Http\Controllers\CarroController@criar')->middleware('App\Http\Middleware\CheckAuth')->name('carros.criar');
Route::put('/carros/{id}', 'App\Http\Controllers\CarroController@editar')->middleware('App\Http\Middleware\CheckAuth')->name('carros.editar');
Route::delete('/carros/{id}', 'App\Http\Controllers\CarroController@deletar')->middleware('App\Http\Middleware\CheckAuth');

// Tickets
Route::get('/tickets/ano/{ano}', 'App\Http\Controllers\TicketController@listarPorAno')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/tickets/ativos', 'App\Http\Controllers\TicketController@listarAtivos')->name('tickets')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/tickets/todos', 'App\Http\Controllers\TicketController@listarTodos')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/ticket', 'App\Http\Controllers\TicketController@novo');
Route::put('/tickets/{id}', 'App\Http\Controllers\TicketController@atualizar')->middleware('App\Http\Middleware\CheckAuth');
Route::delete('/tickets/{id}', 'App\Http\Controllers\TicketController@deletar')->middleware('App\Http\Middleware\CheckAuth');

// Admin
Route::get('/admin', 'App\Http\Controllers\AdminController@listar')->name("admin")->middleware('App\Http\Middleware\CheckAuth');

// Tipos

// Usuarios