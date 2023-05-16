@extends('template')

@section('conteudo')
    <!-- Titulo -->
    <h1 class="text-center">
        <span><i class="fa-solid fa-car" style="font-size: 1.2em;"></i></span>
        <div class="text-center">Carros</div>
    </h1>

    <!-- Botão de criar novo carro -->
    <div class='centralizado'>
        <button type="button" class="main-btn" data-bs-toggle="modal" data-bs-target="#myModal" style="margin-top: 1.2em;">
            Novo Carro
        </button>
    </div>

    <!-- Mensagem de sucesso -->
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Listagem de carros -->
    <div class="row text-black">
        @foreach ($carros as $carro)
            <div class="col-xl-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-car" style="font-size: 3rem"> </i>
                                <div class="ms-3">
                                    <p class="fw-bold mb-1">
                                        {{ $carro->placa }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            ID_Cliente:
                                        </strong>
                                        {{ $carro->cliente->id }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong>
                                            Nome do Cliente:
                                        </strong>
                                        {{ $carro->cliente->nome }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Botões de editar e excluir -->
                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-center">
                        <a name="btnEditar" id="btnEditar" data-bs-toggle='modal' data-bs-target='#modalEditar'
                            data-bs-toggle='modal' data-bs-target='#modalEditar' data-id='{{ $carro->id }}'
                            data-nome='{{ $carro->cliente->nome }}' data-placa='{{ $carro->placa }}'
                            data-cliente_id='{{ $carro->cliente->id }}'
                            class='btn btn-editar btn-link m-0 bg-primary text-reset text-decoration-none mx-2'
                            role="button" data-ripple-color="danger">
                            <i class="fa-sharp fa-solid fa-pen-to-square text-white"></i>
                            <span class="text-white" style="font-weight: bold;">Editar</span>
                        </a>

                        <form method="POST" action="/carros/{{ $carro->id }}"
                            onsubmit="return confirm('Tem certeza que deseja excluir este carro?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class='btn btn-danger m-0 bg-danger text-reset text-decoration-none mx-2'
                                role="button" data-ripple-color="danger">
                                <i class="fa-sharp fa-solid fa-trash text-white"></i>
                                <span class="text-white" style="font-weight: bold;">Remover</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center" style="padding-top: 2em">
        {{ $carros->links() }}
    </div>

    <!-- Criação da modal -->
    <div class="modal fade text-black" data-bs-backdrop="false" id="myModal" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content corzinha">
                <div class="modal-header text-black">
                    <h5 class="modal-title" id="exampleModalLabel">Inserir Carro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">

                    <!-- Formulário de inserção de carros -->
                    <form method="POST" action="{{ route('carros.criar') }}" id="form-carro" name="form-carro">
                        @csrf

                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa:</label>
                            <div class="input-group col-mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-spellcheck"></i>
                                </span>
                                <input placeholder="Informe a placa do carro" type="text" name="placa" id="placa"
                                    class="form-control">
                                <small id="msgPlaca" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="cliente_id" class="form-label">Cliente:</label>
                            <div class="input-group col-mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-vcard"></i>
                                </span>
                                <select name="cliente_id" class="form-select" aria-label="cliente_id">
                                    <option selected value="-1">Selecione um cliente</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                                <small id="msgCliente" class="form-text text-danger"></small>
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

    <!-- Criação da modal -->
    <div class="modal fade text-black" data-bs-backdrop="false" id="modalEditar" tabindex="-1"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content corzinha">
                <div class="modal-header text-black">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Carro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                </div>
                <div class="modal-body">

                    <!-- Formulário de edição de carros -->
                    <form method="POST" action="{{ route('carros.editar', ['id' => $carro->id]) }}" id="form-carro"
                        name="form-carro">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="carro_id" value="{{ $carro->id }}">

                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa:</label>
                            <div class="input-group col-mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-spellcheck"></i>
                                </span>
                                <input placeholder="Informe a placa do carro" type="text" name="placa"
                                    id="placa" class="form-control" value="{{ $carro->placa }}">
                                <small id="msgPlaca" class="form-text text-danger"></small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="cliente_id" class="form-label">Cliente:</label>
                            <div class="input-group col-mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-person-vcard"></i>
                                </span>
                                <select name="cliente_id" class="form-select" aria-label="cliente_id">
                                    <option selected value="-1">Selecione um cliente</option>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}"
                                            {{ $cliente->id == $carro->cliente_id ? 'selected' : '' }}>
                                            {{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                                <small id="msgCliente" class="form-text text-danger"></small>
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
