@extends('template')

@section('conteudo')
    <style>
        .link-sem-decoracao {
            color: #000;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .link-sem-decoracao:hover {
            color: #fff;
        }

        .link-sem-decoracao:hover .card {
            background-color: #007bff;
        }

        .flex-container {
            display: flex;
            justify-content: center;
        }
    </style>

    <h1 style="text-align: center; margin-bottom: 1.3em;">
        <span><i class="fa-sharp fa-solid fa-gauge" style="font-size: 1.2em;"></i></span>
        <div>Dashboard</div>
    </h1>

    <div class="row justify-content-center mb-3">
        <div class="col-md-4">
            <a href="/carros" class="link-sem-decoracao">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-car" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                        <h5 class="card-title">Carros Cadastrados</h5>
                        <h1 class="card-text font-weight-bold">{{ $carrosCount }}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/clientes" class="link-sem-decoracao">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-user-group"
                            style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                        <h5 class="card-title">Clientes Cadastrados</h5>
                        <h1 class="card-text font-weight-bold">{{ $clientesCount - 1 }}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/tickets/ativos" class="link-sem-decoracao">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-ticket" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                        <h5 class="card-title">Tickets Atuais</h5>
                        <h1 class="card-text font-weight-bold">{{ $ticketsAtuaisCount }}</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="/tickets/todos" class="link-sem-decoracao">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-clock-rotate-left"
                            style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                        <h5 class="card-title">Tickets no Histórico Total</h5>
                        <h1 class="card-text font-weight-bold">{{ $ticketsTotalCount }}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/vagas" class="link-sem-decoracao">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-car-on" style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                        <h5 class="card-title">Vagas Livres</h5>
                        <h1 class="card-text font-weight-bold">{{ $vagasDisponiveisCount }}</h1>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="/vagas" class="link-sem-decoracao">
                <div class="card text-center">
                    <div class="card-body">
                        <i class="fa-solid fa-car-tunnel"
                            style="font-size: 3rem; margin-bottom: 1rem; margin-top: 1rem;"></i>
                        <h5 class="card-title">Vagas Totais</h5>
                        <h1 class="card-text font-weight-bold">{{ $vagasTotalCount }}</h1>
                    </div>
                </div>
            </a>
        </div>
    </div>

    @php
        $dataHoraAtual = \Carbon\Carbon::now();
        $dataHoraEncerramento = \Carbon\Carbon::now()->endOfDay();
        
        $diferenca = $dataHoraAtual->diff($dataHoraEncerramento);
    @endphp

    <div class="flex-container">
        <div class="centralizado" style="margin-top: 4em; padding-right: 6em;">
            <div style="display: block;">
                <span>Horário Atual do Sistema:</span>
            </div>
            <div style="display: block;">
                <span style="font-size: 2em; font-weight: bold;" id="horario-atual">{{ $dataHoraAtual->format('H:i:s') }}</span>
            </div>
        </div>
        <div class="centralizado" style="margin-top: 4em;">
            <div style="display: block;">
                <span>Encerramento dos Tickets:</span>
            </div>
            <div style="display: block;">
                <span style="font-size: 2em; font-weight: bold;" id="contador">{{ $diferenca->format('%H:%I:%S') }}</span>
            </div>
        </div>
    </div>

    <script>
        setInterval(function() {
            var horarioAtualElemento = document.getElementById('horario-atual');
            var contadorElemento = document.getElementById('contador');

            var dataHoraAtual = new Date();
            var horas = ('0' + dataHoraAtual.getHours()).slice(-2);
            var minutos = ('0' + dataHoraAtual.getMinutes()).slice(-2);
            var segundos = ('0' + dataHoraAtual.getSeconds()).slice(-2);

            // Atualizar o horário atual do sistema com os novos valores
            horarioAtualElemento.textContent = horas + ':' + minutos + ':' + segundos;

            var contadorTexto = contadorElemento.textContent;
            var partes = contadorTexto.split(':');
            var horas = parseInt(partes[0], 10);
            var minutos = parseInt(partes[1], 10);
            var segundos = parseInt(partes[2], 10);

            // Reduzir um segundo
            segundos--;

            // Verificar se chegou a zero
            if (segundos < 0) {
                segundos = 59;
                minutos--;

                if (minutos < 0) {
                    minutos = 59;
                    horas--;

                    if (horas < 0) {
                        horas = 0;
                        minutos = 0;
                        segundos = 0;
                    }
                }
            }

            // Atualizar o contador com os novos valores
            contadorElemento.textContent = ('0' + horas).slice(-2) + ':' +
                ('0' + minutos).slice(-2) + ':' +
                ('0' + segundos).slice(-2);
        }, 1000);
    </script>
@endsection
