<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Cliente;
use App\Models\Vagas;
use App\Models\Carro;
class AssistantController extends Controller
{


    function checkTables(Request $request)
    {
        $tabelasFaltantes = json_decode($request->session()->get('tabelas'), true);
        return view('setup', compact('tabelasFaltantes'));
    }

    function success()
    {

        return view('success');
    }

    function checkSuccess(Request $request)
    {
        $userExist = Schema::hasTable('usuario');
        $carro = Schema::hasTable('carro');
        $cliente = Schema::hasTable('cliente');
        $ticket = Schema::hasTable('ticket');
        $tipo = Schema::hasTable('tipo');
        $vaga = Schema::hasTable('vaga');
        $banco = DB::connection()->getPdo();

        $tabelasFaltantes = [
            'userExist' => $userExist,
            'carro' => $carro,
            'cliente' => $cliente,
            'ticket' => $ticket,
            'tipo' => $tipo,
            'vaga' => $vaga,
            'banco' => $banco,
        ];
        return view('setup', compact('tabelasFaltantes'));
    }

    function checkUser()
    {
            $send = [];
            $usuario = Usuario::exists();
            $send['usuario'] = $usuario;
            if (!$usuario) {
                return view('setupUser', ['usuario' => $usuario]);
            } else {

                return view('setupUser', ['usuario' => $usuario]);
            }

    }

    public function createTables(Request $request)
    {

        $osshiroSan = $request->input('osshiro');
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
                $table->string('image')->nullable();
            });

        }


        if (!$vaga) {
            Schema::create('vaga', function ($table) {
                $table->increments('id');
                $table->boolean('estado');
            });
            if($osshiroSan){
                //Vaga 1
                $vaga = new Vagas();
                $vaga->estado = true;
                $vaga->save();

                //Vaga 2
                $vaga = new Vagas();
                $vaga->estado = true;
                $vaga->save();

            }

        }


        if (!$tipo) {
            Schema::create('tipo', function ($table) {
                $table->increments('id');
                $table->decimal('preco', 30, 2);
                $table->string('descr');
            });
            if($osshiroSan){
                $tipo = new Tipo();
                $tipo->descr = "Preço por hora moto";
                $tipo->preco = 2.98;
                $tipo->save();

                $tipo = new Tipo();
                $tipo->descr = "Preço por hora carro";
                $tipo->preco = 5.98;
                $tipo->save();
            }

        }



        if (!$cliente) {
            Schema::create('cliente', function ($table) {
                $table->increments('id');
                $table->string('cpf')->unique();
                $table->string('nome');
                $table->string('telefone');
                $table ->boolean('ativo')->nullable();
            });
                    $novoCliente = new Cliente();
                    $novoCliente->id = 0; // Defina o ID do cliente como 0 para evitar quebra de no cadastro do carro sem cliente
                    $novoCliente->nome = 'Sem cadastro';
                    $novoCliente->telefone = '0000000000';
                    $novoCliente->cpf = '00000000000';
                    $novoCliente->ativo = true;
                    $novoCliente->save();
                    if($osshiroSan){
                        $novoCliente = new Cliente();
                        $novoCliente->nome = 'Osshiro';
                        $novoCliente->telefone = '67995639875';
                        $novoCliente->cpf = '00506809523';
                        $novoCliente->ativo = true;
                        $novoCliente->save();

                        //cliente 2
                        $novoCliente = new Cliente();
                        $novoCliente->nome = 'Palestrinha';
                        $novoCliente->telefone = '67995639875';
                        $novoCliente->cpf = '00506809552';
                        $novoCliente->ativo = true;
                        $novoCliente->save();

                    }
        }



        if (!$carro) {
            Schema::create('carro', function ($table) {
                $table->increments('id');
                $table->string('placa')->unique();
                $table->unsignedBigInteger('cliente_id');
                $table->foreign('cliente_id')->references('id')->on('cliente');
                $table->boolean('estado');
            });
            if($osshiroSan){
                $carro = new Carro();
                $carro->placa = "HSF8I90";
                $carro->cliente_id = 1;
                $carro->estado = true;

                //carro 2
                $carro = new Carro();
                $carro->placa = "HKL9I90";
                $carro->cliente_id = 2;
                $carro->estado = true;
            }

        }




        if (!$ticket) {
            Schema::create('ticket', function ($table) {
                $table->increments('id');
                $table->unsignedBigInteger('carro_id');
                $table->unsignedBigInteger('vaga_id');
                $table->unsignedBigInteger('tipo_id');
                $table->timestampTz('hora_entrada');
                $table->boolean('estado');
                $table->timestampTz('hora_saida')->nullable();
                $table->decimal('total_pago', 30, 2)->nullable();

                $table->foreign('carro_id')->references('id')->on('carro');
                $table->foreign('vaga_id')->references('id')->on('vaga');
                $table->foreign('tipo_id')->references('id')->on('tipo');

            });

            $db = DB::connection()->getPdo();


            $inserir ="
            -- FUNCTION: public.inserir_ticket(integer, integer, integer, boolean)

            -- DROP FUNCTION IF EXISTS public.inserir_ticket(integer, integer, integer, boolean);

            CREATE OR REPLACE FUNCTION public.inserir_ticket(
                carro integer,
                vaga_uso integer,
                tipo integer,
                estado boolean)
                RETURNS void
                LANGUAGE 'plpgsql'
                COST 100
                VOLATILE PARALLEL UNSAFE
            AS \$BODY\$
            begin
                insert into ticket(carro_id, vaga_id, tipo_id, hora_entrada, estado) values (carro, vaga_uso, tipo, CURRENT_TIMESTAMP, estado);
                update vaga set estado = false where vaga.id = vaga_uso;
            end;
            \$BODY\$;

            ALTER FUNCTION public.inserir_ticket(integer, integer, integer, boolean)
                OWNER TO postgres;
        ";
            $remover = "
            -- FUNCTION: public.encerrar_ticket(integer)

            -- DROP FUNCTION IF EXISTS public.encerrar_ticket(integer);

            CREATE OR REPLACE FUNCTION public.encerrar_ticket(
                ticket_id integer)
                RETURNS void
                LANGUAGE 'plpgsql'
                COST 100
                VOLATILE PARALLEL UNSAFE
            AS \$BODY\$
            begin
                update vaga set estado = true where vaga.id = (select vaga_id from ticket where ticket.id = ticket_id);
                update ticket set hora_saida = current_timestamp where ticket_id = ticket.id;
                update ticket set total_pago = (EXTRACT(EPOCH FROM hora_saida) - EXTRACT(EPOCH FROM hora_entrada))/3600
                *
                (select preco from tipo where (select tipo_id from ticket where ticket.id = ticket_id) = tipo.id) where ticket.id = ticket_id;
                update ticket set estado = false where ticket_id = ticket.id;
            end;
            \$BODY\$;

            ALTER FUNCTION public.encerrar_ticket(integer)
                OWNER TO postgres;
        ";

        $db->exec($remover);
        $db->exec($inserir);
        }



        return redirect()->route('check');
        //return response()->json(['message' => 'Tabelas criadas com sucesso']);
    }
}
