@extends('template')

@section('conteudo')
    <!-- Título -->
    <h1 class="text-center">
        <span><i class="fa-solid fa-user-group" style="font-size: 1.2em;"></i></span>
        <div class="text-center">Clientes</div>
    </h1>

    <!-- Botão de inserção -->
    <div class='centralizado'>
        <button type="button" class="main-btn" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-top: 1.2em;">
            Novo cliente
        </button>
    </div>

    <div class="row text-black">
        @foreach ($clientes as $cliente)
            <div class="col-xl-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <img src="https://avatars.githubusercontent.com/u/14907837?v=4" alt=""
                                    style="width: 45px; height: 45px" class="rounded-circle" />
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">
                                        {{ $cliente->nome }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            CPF:
                                        </strong>
                                        {{ $cliente->cpf }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            Telefone:
                                        </strong>
                                        {{ $cliente->telefone }}
                                    </p>
                                </div>
                            </div>

                            <!-- Botão de ativo/inativo -->
                            <form action="{{ route('alterar-estado-cliente', ['id' => $cliente->id]) }}" method="POST"
                                class="d-inline">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-link text-decoration-none" style="padding: 0;">
                                    @php
                                        $cor = $cliente->ativo ? 'bg-success' : 'bg-danger';
                                        $text = $cliente->ativo ? 'Ativo' : 'Inativo';
                                    @endphp
                                    <span class="badge rounded-pill {{ $cor }}">{{ $text }}</span>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Botões do card -->
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-center">

                        <!-- Botão de editar -->
                        <a name="btnEditar" id="btnEditar" data-bs-toggle='modal' data-bs-target='#modalEditar'
                            data-bs-toggle='modal' data-bs-target='#myModal' data-id='{{ $cliente->id }}'
                            data-nome='{{ $cliente->nome }}' data-cpf='{{ $cliente->cpf }}'
                            data-telefone='{{ $cliente->telefone }}'
                            class='btn btn-editar btn-link m-0 bg-primary text-reset text-decoration-none mx-2'
                            role="button" data-ripple-color="danger">
                            <i class="fa-sharp fa-solid fa-pen-to-square text-white"></i>
                            <span class="text-white" style="font-weight: bold;">Editar</span>
                        </a>

                        <!-- Botão de alterar estado -->
                        <form action="{{ route('alterar-estado-cliente', ['id' => $cliente->id]) }}" method="POST"
                            class="d-inline">
                            @method('PUT')
                            @csrf
                            <button type="submit" class="btn btn-link m-0 bg-primary text-reset text-decoration-none mx-2"
                                role="button" data-ripple-color="danger">
                                <i class="fa-sharp fa-solid fa-rotate text-white"></i>
                                <span class="text-white" style="font-weight: bold;">Alterar estado</span>
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center" style="padding-top: 2em">
        {{ $clientes->links() }}
    </div>

    <!-- Modal de inserção -->
    @include('modals.clientesModalInserir')

    <!-- Modal de edição -->
    @include('modals.clientesModalEditar')
    
@endsection
