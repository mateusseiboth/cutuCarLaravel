<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;

class TicketController extends Controller
{
    function listarAtivos(){
        $page = ['title' => 'Tickets Ativos', 'botao' => true];
        $tickets = Ticket::where('estado', true)->orderByRaw('id')->get();
        return view('tickets',
                      compact('tickets', 'page'));
    }

    function listarTodos(){
        $page = ['title' => 'Todos os Tickets', 'botao' => false];
        $tickets = Ticket::where('estado', false)->orderByRaw('id')->get();
        return view('tickets',
                      compact('tickets','page'));
    }
}
