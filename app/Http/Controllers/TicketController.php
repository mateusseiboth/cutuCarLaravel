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
}
