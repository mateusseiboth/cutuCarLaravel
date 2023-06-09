<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use Doctrine\DBAL\Driver\Middleware;

//  _____      _          _____              _____                 _
// / ____|    | |        / ____|            / ____|               (_)
// | |    _   _| |_ _   _| |     __ _ _ __  | (___   ___ _ ____   ___  ___ ___
// | |   | | | | __| | | | |    / _` | '__|  \___ \ / _ \ '__\ \ / / |/ __/ _ \
// | |___| |_| | |_| |_| | |___| (_| | |     ____) |  __/ |   \ V /| | (_|  __/
// \_____\__,_|\__|\__,_|\_____\__,_|_|    |_____/ \___|_|    \_/ |_|\___\___|

// Index
Route::get('/', 'App\Http\Controllers\DashboardController@index')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth')->name('home');


// Login
Route::get('/login', 'App\Http\Controllers\LoginController@login')->middleware('App\Http\Middleware\CheckConfig')->name('login');
Route::post('/login', 'App\Http\Controllers\LoginController@logar')->middleware('App\Http\Middleware\CheckConfig');
Route::get('/deslogar', 'App\Http\Controllers\LoginController@deslogar')->name('deslogar');

//About
Route::get('/about', 'App\Http\Controllers\DashboardController@about')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');

// Vagas
Route::get('/vagas', 'App\Http\Controllers\VagasController@listar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/vagas', 'App\Http\Controllers\VagasController@criar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth')->name('vagas.criar');
Route::delete('/vagas/{id}', 'App\Http\Controllers\VagasController@deletar')->name('vagas.delete')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');

// Clientes
Route::get('/clientes', 'App\Http\Controllers\ClienteController@listar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/clientes/criar', 'App\Http\Controllers\ClienteController@criarCliente')->name('criar-cliente')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::put('/cliente/{id}/alterar-estado', 'App\Http\Controllers\ClienteController@alterarEstadoCliente')->name('alterar-estado-cliente')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::put('/cliente/{id}/editar', 'App\Http\Controllers\ClienteController@editarCliente')->name('editar-cliente')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');

// Carros
Route::get('/carros', 'App\Http\Controllers\CarroController@listar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/carros', 'App\Http\Controllers\CarroController@criar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth')->name('carros.criar');
Route::put('/carros/{id}', 'App\Http\Controllers\CarroController@editar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth')->name('carros.editar');
Route::delete('/carros/{id}', 'App\Http\Controllers\CarroController@deletar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::put('/carros/enable/{id}', 'App\Http\Controllers\CarroController@ativar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth')->name('carros.ativar');

// Tickets
Route::get('/tickets/ano/{ano}', 'App\Http\Controllers\TicketController@listarPorAno')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/tickets/ativos', 'App\Http\Controllers\TicketController@listarAtivos')->middleware('App\Http\Middleware\CheckConfig')->name('tickets')->middleware('App\Http\Middleware\CheckAuth');
Route::get('/tickets/todos', 'App\Http\Controllers\TicketController@listarTodos')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::post('/ticket', 'App\Http\Controllers\TicketController@novo')->middleware('App\Http\Middleware\CheckConfig');
Route::get('/tickets/{id}', function ($id) {
    $ticketController = new TicketController;
    return $ticketController->deletar($id);
})->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');

Route::get('/ticket/relatorio', 'App\Http\Controllers\TicketController@relatorio')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');


// Admin
Route::get('/admin', 'App\Http\Controllers\AdminController@listar')->name("admin")->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');

// Tipos
Route::post('/tipos/criar', 'App\Http\Controllers\TipoController@criar')->name('tipo.create')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::delete('/tipos/{id}', 'App\Http\Controllers\TipoController@deletar')->name('tipo.delete')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');

// Usuarios
Route::post('/usuarios/criar', 'App\Http\Controllers\UsuarioController@criarUsuario')->name('criar-usuario')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth');
Route::delete('/usuarios/{id}', 'App\Http\Controllers\UsuarioController@deletar')->middleware('App\Http\Middleware\CheckConfig')->middleware('App\Http\Middleware\CheckAuth')->name('usuarios.deletar');

//Assistente
Route::get('/assistant/createTables/', 'App\Http\Controllers\AssistantController@createTables')->name('criarTabela');
Route::get('/assistant/check', 'App\Http\Controllers\AssistantController@checkTables')->name('tabelas');
Route::get('/assistant/checkSuccess', 'App\Http\Controllers\AssistantController@checkSuccess')->name('check');
Route::get('/assistant/user', 'App\Http\Controllers\AssistantController@checkUser')->name('firstUser');
Route::post('/assistant/createUser', 'App\Http\Controllers\UsuarioController@criarUsuario')->name('createFirstUser');
Route::get('/assistant/success', 'App\Http\Controllers\AssistantController@success')->name('success');
