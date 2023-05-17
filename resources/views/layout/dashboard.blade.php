@extends('template')

@section('conteudo')
    <h1 style="text-align: center; margin-bottom: 1.3em;">
        <span><i class="fa-sharp fa-solid fa-gauge" style="font-size: 1.2em;"></i></span>
        <div>Dashboard</div>
    </h1>
    <div class="row justify-content-center mb-3">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fa-solid fa-car" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                    <h5 class="card-title">Carros Cadastrados</h5>
                    <h1 class="card-text font-weight-bold">{{ $carrosCount }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fa-solid fa-user-group" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                    <h5 class="card-title">Clientes Cadastrados</h5>
                    <h1 class="card-text font-weight-bold">{{ $clientesCount }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fa-solid fa-ticket" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                    <h5 class="card-title">Tickets Atuais</h5>
                    <h1 class="card-text font-weight-bold">{{ $ticketsAtuaisCount }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fa-solid fa-clock-rotate-left" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                    <h5 class="card-title">Tickets no Histórico Total</h5>
                    <h1 class="card-text font-weight-bold">{{ $ticketsTotalCount }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fa-solid fa-car-on" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                    <h5 class="card-title">Vagas Livres</h5>
                    <h1 class="card-text font-weight-bold">{{ $vagasDisponiveisCount }}</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fa-solid fa-car-tunnel" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                    <h5 class="card-title">Vagas Totais</h5>
                    <h1 class="card-text font-weight-bold">{{ $vagasTotalCount }}</h1>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
