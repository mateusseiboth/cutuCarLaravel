@extends('template')

@section('conteudo')
    <!-- Titulo -->
    <h1 class="text-center">
        <i class="bi bi-building-gear" style="font-size: 3rem"></i>
        <div class="text-center">Painel Admin.</div>
    </h1>

    <!-- Menu de abas -->
    <ul class="nav nav-tabs justify-content-center" style="margin-bottom: 2em">
        <li class="nav-item">
            <a class="nav-link active" id="vagas-tab" data-bs-toggle="tab" href="#vagas">Vagas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tipos-tab" data-bs-toggle="tab" href="#tipos">Tipos de Cobrança</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="usuarios-tab" data-bs-toggle="tab" href="#usuarios">Usuários</a>
        </li>
    </ul>

    <!-- Conteúdo das abas -->
    <div class="tab-content">
        <!-- vagas -->
        <div class="tab-pane fade show active" id="vagas">
            <div class="row text-black d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class='mb-2'>
                        <button type="button" class="btn btn-primary col-md-12" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                            Adicionar nova Vaga
                        </button>
                    </div>
                    <div class="row">
                        @foreach ($vagas as $vaga)
                            <div class="col-md-4 mb-2">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-car-front-fill rounded-circle" style="font-size: 3rem"> </i>
                                                <div class="ms-3">
                                                    Vaga número #{{ $vaga->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                                        <a href='' class='btn btn-link m-0 bg-danger text-reset text-decoration-none'
                                            role="button" data-ripple-color="danger"> <i class="bi bi-trash"></i>
                                            Apagar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>                    
                </div>
            </div>
            <!-- Exibir a paginação -->
            <div class="d-flex justify-content-center" style="padding-top: 2em">
                {{ $vagas->links() }}
            </div>
        </div>
        

        <!-- Tipos de cobrança -->
        <div class="tab-pane fade" id="tipos">
            <div class="row text-black d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary col-md-12" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                            Adicionar novo Tipo de Cobrança
                        </button>
                    </div>
                    @foreach ($tipos as $tipo)
                        <div class="col-xl-12 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-currency-bitcoin" style="font-size: 3rem"> </i>
                                            <div class="ms-3">
                                                <p class="mb-0">
                                                    <strong>
                                                        Tipo de cobrança:
                                                    </strong>
                                                    {{ $tipo->descr }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                                    <a href='' class='btn btn-link m-0 bg-danger text-reset text-decoration-none'
                                        role="button" data-ripple-color="danger"> <i class="bi bi-trash"></i>
                                        Apagar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Usuários -->
        <div class="tab-pane fade" id="usuarios">
            <div class="row text-black d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="mb-2">
                        <button type="button" class="btn btn-primary col-md-12" data-bs-toggle="modal"
                            data-bs-target="#myModal">
                            Adicionar Usuário
                        </button>
                    </div>
                    @foreach ($usuarios as $user)
                        <div class="col-xl-12 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-badge" style="font-size: 3rem"> </i>
                                            <div class="ms-3">
                                                <p class="mb-0">
                                                    <strong>
                                                        ID do usuário:
                                                    </strong>
                                                    {{ $user->id }}
                                                </p>
                                                <p class="mb-0">
                                                    <strong>
                                                        Username:
                                                    </strong>
                                                    {{ $user->username }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                                    <a href='' class='btn btn-link m-0 bg-danger text-reset text-decoration-none'
                                        role="button" data-ripple-color="danger"> <i class="bi bi-trash"></i>
                                        Apagar
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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
