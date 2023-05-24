@extends('template')

@section('conteudo')
    <!-- Cabeçalho da página -->
    <h1 class="text-center">
        <span><i class="{{ $page['icon'] }}" style="font-size: 1.2em;"></i></span>
        <div class="text-center">{{ $page['title'] }}</div>
    </h1>

    <!-- Botão de adicionar -->
    @if ($botao)
        <div class='centralizado'>
            <button type="button" class="main-btn" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-top: 1.2em;">
                Novo ticket
            </button>
        </div>
    @else
        <div class='centralizado' style="margin-bottom: 4em;"></div>
    @endif

    <!-- Mensagem de sucesso -->
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mensagem de erro -->
    @if (session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    <div class="row text-black">
        @foreach ($tickets as $ticket)
            <div class="col-xl-4 mb-4">
                <div class="card col-md-12">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class=" align-self-center ms-2 align-items-center justify-content-center">
                                <i class="bi bi-ticket " style="font-size: 3rem"> </i>
                            </div>
                            <div class="dashed-line"></div>
                            <div class="flex-grow-2 ms-5">
                                <div class="ms-2">
                                    <p class="fw-bold mb-1">
                                        Ticket #{{ $ticket->id }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            Nome do cliente:
                                        </strong>
                                        {{ $ticket->carro->cliente->nome }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            Placa do carro:
                                        </strong>
                                        {{ $ticket->carro->placa }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            Hora de entrada:
                                        </strong>
                                        {{ date('d/m H:i', strtotime($ticket->hora_entrada)) }}
                                    </p>
                                    @if ($ticket->hora_saida != null)
                                        <p class="text-muted mb-0">
                                            <strong>
                                                Hora de Saída:
                                            </strong>
                                            {{ date('d/m H:i', strtotime($ticket->hora_saida)) }}
                                        </p>
                                    @endif
                                    @if ($ticket->total_pago != null)
                                        <p class="text-muted mb-0">
                                            <strong>
                                                Total Pago:
                                            </strong>
                                            {{ $ticket->total_pago }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                        $botao = $page['botao'] ? '' : 'd-none';
                    @endphp

                    <div class="{{ $botao }} card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a href='/tickets/{{ $ticket->id }}'
                            class='{{ $botao }} btn btn-link m-0 bg-danger text-reset text-decoration-none'
                            role="button" data-ripple-color="danger">
                            <i class="fa-sharp fa-solid fa-trash text-white"></i>
                            <span class="text-white" style="font-weight: bold;">Encerrar</span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center" style="padding-top: 2em">
        {{ $tickets->links() }}
    </div>

    @include('modals.ticketsModal')
@endsection
