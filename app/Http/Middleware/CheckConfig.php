<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Usuario;
use App\Models\Cliente;


class CheckConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
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
        if ($carro && $cliente && $ticket && $tipo && $vaga && $userExist) {
            $userCreate = Usuario::exists();
            if ($userCreate) {
                return $next($request);
            } else {
                $cliente = Cliente::find(0);
                if (!$cliente) {
                    $novoCliente = new Cliente();
                    $novoCliente->id = 0; // Defina o ID do cliente como 0 para evitar quebra de no cadastro do carro sem cliente
                    $novoCliente->nome = 'Sem cadastro';
                    $novoCliente->telefone = '0000000000';
                    $novoCliente->cpf = '00000000000';
                    $novoCliente->save();
                }

                return redirect()->route('firstUser');
            }
        } else {
            return redirect()->route('tabelas')->with('tabelas', json_encode($tabelasFaltantes));
        }


    }
}
