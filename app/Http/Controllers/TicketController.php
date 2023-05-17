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

    function deletar($id){
        $result = DB::select('select encerrar_ticket(?)', [$id]);
        var_dump($result);
        return redirect('/tickets/ativos');

    }

    function listarAtivos()
    {
        $page = ['title' => 'Tickets Ativos', 'botao' => true, 'icon' => 'fa-solid fa-ticket'];
        $tickets = Ticket::where('estado', true)->orderByRaw('id')->paginate(6);
        $carros = Carro::orderBy('id')->get();
        $tipos = Tipo::orderBy('id')->get();
        $vagas = Vagas::where('estado', true)->orderBy('id')->get();
        $botao = true;
        return view('tickets', compact('tickets', 'page', 'carros', 'tipos', 'vagas', 'botao'));
    }

    function listarTodos()
    {
        $page = ['title' => 'Histórico', 'botao' => false, 'icon' => 'fa-solid fa-clock-rotate-left'];
        $tickets = Ticket::where('estado', false)->orderByRaw('id')->paginate(6);
        $carros = Carro::orderBy('id')->get();
        $tipos = Tipo::orderBy('id')->get();
        $vagas = Vagas::where('estado', true)->orderBy('id')->get();
        $botao = false;
        return view('tickets', compact('tickets', 'page', 'carros', 'tipos', 'vagas', 'botao'));
    }

    function novo()
    {

        if (isset($_POST['cadastrado'])) {
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


        $result = DB::select('select inserir_ticket(?,?,?,?)', [$carro_id, $vaga_id, $tipo_id, true]);
        return redirect()->route('tickets');
    }
}
