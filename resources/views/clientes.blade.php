@extends('template')

@section('conteudo')
    <h1 class="text-center">
        <i class="bi bi-person-fill" style="font-size: 3rem"></i>
        <div class="text-center">Clientes</div>
    </h1>
    <div class='mb-3'>
        <button type="button" class="btn btn-primary col-md-2" data-bs-toggle="modal" data-bs-target="#myModal">
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
                                <a class="text-decoration-none" href=''>
                                    @php
                                        $cor = $cliente->ativo ? 'bg-success' : 'bg-danger';
                                        $text = $cliente->ativo ? 'Ativo' : 'Inativo';
                                    @endphp
                                    <span class="badge rounded-pill {{ $cor }}">{{ $text }}</span></a>
                            </div>
                        </div>
                        <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                            <a name="btnEditar" id="btnEditar" data-bs-toggle='modal' data-bs-target='#myModal'
                                data-bs-toggle='modal' data-bs-target='#myModal' data-id='{{ $cliente->id }}'
                                data-nome='{{ $cliente->nome }}' data-cpf='{{ $cliente->cpf }}'
                                data-telefone='{{ $cliente->telefone }}'
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
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content corzinha">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Inserir Novo Cliente</h5>
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