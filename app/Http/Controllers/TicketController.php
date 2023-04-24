<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\Carro;
use App\Models\Tipo;
use App\Models\Vagas;

class TicketController extends Controller
{
    function listarAtivos(){
        $page = ['title' => 'Tickets Ativos', 'botao' => true];
        $tickets = Ticket::where('estado', true)->orderByRaw('id')->get();
        $carros = Carro::orderBy('id')->get();
        $tipos = Tipo::orderBy('id')->get();
        $vagas = Vagas::orderBy('id')->get();
        return view('tickets',
                      compact('tickets', 'page', 'carros', 'tipos', 'vagas'));
    }

    function listarTodos(){
        $page = ['title' => 'Todos os Tickets', 'botao' => false];
        $tickets = Ticket::where('estado', false)->orderByRaw('id')->get();
        $carros = Carro::orderBy('id')->get();
        $tipos = Tipo::orderBy('id')->get();
        $vagas = Vagas::where('estado', true)->orderByRaw('id')->get();
        return view('tickets',
                      compact('tickets', 'page', 'carros', 'tipos', 'vagas'));
    }

    function novo(){

        if(isset($_POST['cadastrado'])){
            $carro = new Carro();
            $carro->placa = $_POST['placa'];
            $carro->cliente_id = 0;

            $carro_id = DB::table('carro')->insertGetId(['placa' => $carro->placa, 'cliente_id' => $carro->cliente_id]);

        } else {
            $carro_id = $_POST['carro_id'];
        }

        $tipo_id = $_POST['tipo_id'];
        $vaga_id = $_POST['vaga_id'];

        var_dump($carro_id, $tipo_id, $vaga_id);


        $result = DB::select('select inserir_ticket(?,?,?,?)', [$carro_id, $vaga_id,$tipo_id, true]);
        return redirect()->route('tickets');
    }
}
