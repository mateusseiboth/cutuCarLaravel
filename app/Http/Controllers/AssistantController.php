<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AssistantController extends Controller
{


    function checkTables(Request $request)
    {
        $tabelasFaltantes = json_decode($request->session()->get('tabelas'), true);
        return view('setup', compact('tabelasFaltantes'));
    }

    function checkUser()
    {
        return view('setupUser');
    }

    public function createTables(Request $request)
    {

        $userExist = Schema::hasTable('usuario');
        $carro = Schema::hasTable('carro');
        $cliente = Schema::hasTable('cliente');
        $ticket = Schema::hasTable('ticket');
        $tipo = Schema::hasTable('tipo');
        $vaga = Schema::hasTable('vaga');

        if (!$userExist) {
            Schema::create('usuario', function ($table) {
                $table->increments('id');
                $table->string('username')->unique();
                $table->string('password');
            });

        }


        if (!$vaga) {
            Schema::create('vaga', function ($table) {
                $table->increments('id');
                $table->boolean('estado');
            });

        }


        if (!$tipo) {
            Schema::create('tipo', function ($table) {
                $table->increments('id');
                $table->decimal('preco', 30, 2);
                $table->string('descr');
            });

        }



        if (!$cliente) {
            Schema::create('cliente', function ($table) {
                $table->increments('id');
                $table->string('cpf')->unique();
                $table->string('nome');
                $table->string('telefone');
            });

        }



        if (!$carro) {
            Schema::create('carro', function ($table) {
                $table->increments('id');
                $table->string('placa')->unique();
                $table->unsignedBigInteger('cliente_id');
                $table->foreign('cliente_id')->references('id')->on('cliente');
            });

        }




        if (!$ticket) {
            Schema::create('ticket', function ($table) {
                $table->increments('id');
                $table->unsignedBigInteger('carro_id');
                $table->unsignedBigInteger('vaga_id');
                $table->unsignedBigInteger('tipo_id');
                $table->timestamp('hora_entrada');
                $table->boolean('estado');
                $table->timestamp('hora_saida');
                $table->decimal('total_pago', 30, 2);

                $table->foreign('carro_id')->references('id')->on('carro');
                $table->foreign('vaga_id')->references('id')->on('vaga');
                $table->foreign('tipo_id')->references('id')->on('tipo');
            });

        }



        return redirect()->route('home');
        //return response()->json(['message' => 'Tabelas criadas com sucesso']);
    }
}
