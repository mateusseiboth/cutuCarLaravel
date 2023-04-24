@extends('template')

@section('conteudo')
    <h1 class="text-center">
        <i class="bi bi-car-front-fill" style="font-size: 3rem"></i>
        <div class="text-center">Carros</div>
    </h1>
    <div class='mb-3'>
        <button type="button" class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#myModal">
            Novo Carro
        </button>
    </div>
    <div class="row text-black">
            @foreach ($carros as $carro)
                <div class="col-xl-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-car-front-fill rounded-circle"
                                        style="font-size: 3rem"> </i>
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
                        <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                            <a name="btnEditar" id="btnEditar" data-bs-toggle='modal' data-bs-target='#myModal'
                                data-bs-toggle='modal' data-bs-target='#myModal' data-id='{{ $carro->id }}'
                                data-nome='{{ $carro->cliente->nome }}' data-placa='{{ $carro->placa }}'
                                data-cliente_id='{{ $carro->cliente->id }}'
                                class='btn btn-editar btn-link m-0 bg-primary text-reset text-decoration-none'
                                role="button" data-ripple-color="danger"> <i class="bi bi-pencil"></i>
                                Editar
                            </a>

                            <a href='' class='btn btn-link m-0 bg-danger text-reset text-decoration-none'
                                role="button" data-ripple-color="danger"> <i class="bi bi-trash"></i>
                                Alterar estado
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Criação da modal -->
        <div class="modal fade text-black" data-bs-backdrop="false" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content corzinha">
                    <div class="modal-header text-black">
                        <h5 class="modal-title" id="exampleModalLabel">Inserir/Editar Carro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Formulário de inserção/edição de clientes -->
                        <form method="POST" action="" id="form-client" name="form-client">
                            <input type="hidden" name="action" value="save_cliente">
                            <input type="hidden" name="id" value="">

                            <div class="mb-3">
                                <label for="placa" class="form-label">Placa:</label>
                                <div class="input-group col-mb-3">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="bi bi-spellcheck"></i>
                                    </span>
                                    <input placeholder="Informe a placa do carro" type="text" name="placa" id="placa" class="form-control">
                                    <small id="msgNome" class="form-text text-danger"></small>
                                </div>
                            </div>

                             <div class="mb-3">

                            <label for="tipo_id" class="form-label">Cliente</label>
                            <div class="input-group col-mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi  bi-person-vcard"></i>
                                </span>
                                <select name="tipo_id" class="form-select" aria-label="tipo_id">
                                    <option selected name='tipo_id' value='-1'>Selecione um cliente</option>
                                    @foreach ($clientes as $cliente)
                                        <option name='tipo_id' value='{{ $cliente->id }}'>{{ $cliente->nome }}
                                        </option>
                                    @endforeach
                                </select>
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
