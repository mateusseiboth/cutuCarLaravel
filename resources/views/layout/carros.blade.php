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

    <!-- Modal de cadastro -->
    @include('modals.carrosModalInserir')

    <!-- Modal de edição -->
    @include('modals.carrosModalEditar')
    
@endsection
