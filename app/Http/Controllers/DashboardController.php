<?php
namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Cliente;
use App\Models\Ticket;
use App\Models\Vagas;

class DashboardController extends Controller
{
    public function index()
    {
        $carrosCount = Carro::count();
        $clientesCount = Cliente::count();
        $ticketsAtuaisCount = Ticket::where('estado', 'true')->count();
        $ticketsTotalCount = Ticket::count();
        $vagasDisponiveisCount = Vagas::where('estado', 'true')->count();
        $vagasTotalCount = Vagas::count();

        return view('dashboard', compact(
            'carrosCount',
            'clientesCount',
            'ticketsAtuaisCount',
            'ticketsTotalCount',
            'vagasDisponiveisCount',
            'vagasTotalCount'
        ));
    }
}

?>