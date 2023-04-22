@extends('template')

<style>
    .dashed-line {
        position: absolute;
        left: 100px;
        height: 66%;
        /* altura da linha */
        border-left: 1px dashed black;
        /* borda esquerda pontilhada */
    }
</style>
@section('conteudo')
    <h1 class="text-center">
        <i class="bi bi-ticket" style="font-size: 3rem"></i>
        <div class="text-center">{{$page['title']}}</div>
    </h1>
    <div class='mb-3'>
        <button type="button" class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#myModal">
            Novo ticket
        </button>
    </div>
    <div class="row text-black">
        @foreach ($tickets as $ticket)
            <div class="col-xl-4 mb-4">
                <div class="card col-md-12">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1 align-self-center ms-2 align-items-center justify-content-center">
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
                                        {{ $ticket->hora_entrada }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            Hora de saida:
                                        </strong>
                                        {{ $ticket->hora_saida }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            Total pago:
                                        </strong>
                                        {{ $ticket->total_pago }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @php
                    $botao = $page['botao'] ? '' : 'd-none';
                    @endphp
                    <div class="{{$botao}} card-footer border-0 bg-light p-2 d-flex justify-content-around">
                        <a href='' class='{{$botao}} btn btn-link m-0 bg-danger text-reset text-decoration-none' role="button"
                            data-ripple-color="danger"> <i class="bi bi-trash"></i>
                            Encerrar
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    </div>
    <!-- Criação da modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content corzinha">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inserir/Editar Carro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">

                    <!-- Formulário de inserção/edição de clientes -->
                    <form method="POST" action="" id="form-client" name="form-client">
                        <input type="hidden" name="action" value="save_cliente">
                        <input type="hidden" name="id" value="">

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <div class="input-group col-mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-spellcheck"></i>
                                </span>
                                <input type="text" name="nome" id="nome" class="form-control">
                                <small id="msgNome" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <div class="input-group col-mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-vcard"></i>
                                </span>
                                <input type="text" name="cpf" id="cpf" class="form-control">
                                <small id="msgCpf" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <div class="input-group col-mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <input type="text" name="telefone" id="telefone" class="form-control">
                                <small id="msgTelefone" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
