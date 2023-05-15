@extends('template')

@section('conteudo')
    <!-- Titulo -->
    <h1 class="text-center">
        <span><i class="fa-solid fa-user-tie" style="font-size: 1.2em;"></i></span>
        <div class="text-center">Painel Admin.</div>
    </h1>

    <!-- Menu de abas -->
    <ul class="nav nav-tabs justify-content-center" style="margin-bottom: 1em">
        <li class="nav-item">
            <a class="nav-link {{ Request::get('tab') == 'vagas' ? 'active' : '' }}"
                href="{{ route('admin', ['tab' => 'vagas']) }}">Vagas</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::get('tab') == 'tipos' ? 'active' : '' }}"
                href="{{ route('admin', ['tab' => 'tipos']) }}">Tipos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::get('tab') == 'usuarios' ? 'active' : '' }}"
                href="{{ route('admin', ['tab' => 'usuarios']) }}">Usuários</a>
        </li>
    </ul>

    <!-- Conteúdo das abas -->
    <div class="tab-content">

        <!-- Vagas -->
        <div class="tab-pane fade show {{ Request::get('tab') == 'vagas' ? 'active' : '' }}" id="vagas">
            <div class="row text-black d-flex justify-content-center">
                <div class="col-lg-10">

                    <!-- Botão de criação de vaga -->
                    <div class="centralizado">
                        <form method="POST" action="{{ route('vagas.criar') }}">
                            @csrf
                            <button type="submit" class="main-btn">
                                Adicionar Vaga
                            </button>
                        </form>
                    </div>

                    <!-- Listagem -->
                    <div class="row">
                        @foreach ($vagas as $vaga)
                            <div class="col-md-4 mb-2">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-car-front-fill rounded-circle" style="font-size: 3rem"> </i>
                                                <div class="ms-3">
                                                    Vaga número #{{ $vaga->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Botões de ação -->
                                    <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">

                                        <!-- Botão de deletar -->
                                        <form action="{{ route('vagas.delete', $vaga->id) }}" method="POST"
                                            onsubmit="return confirm('Tem certeza de que deseja excluir esta vaga?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-link m-0 bg-danger text-reset text-decoration-none"
                                                role="button" data-ripple-color="danger">
                                                <i class="fa-sharp fa-solid fa-trash text-white"></i>
                                                <span class="text-white" style="font-weight: bold;">Apagar</span>
                                            </button>
                                        </form>

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
        <div class="tab-pane fade show {{ Request::get('tab') == 'tipos' ? 'active' : '' }}" id="tipos">
            <div class="row text-black d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="centralizado">
                        <button type="button" class="main-btn" data-bs-toggle="modal" data-bs-target="#myModal">
                            Adicionar Tipo de Cobrança
                        </button>
                    </div>
                    @foreach ($tipos as $tipo)
                        <div class="col-md-6 col-lg-4 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-currency-bitcoin" style="font-size: 3rem"> </i>
                                            <div class="ms-3">
                                                <p class="mb-0">
                                                    <strong>Tipo de cobrança:</strong>
                                                    {{ $tipo->descr }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                                    <a href='' class='btn btn-link m-0 bg-danger text-reset text-decoration-none'
                                        role="button" data-ripple-color="danger">
                                        <i class="fa-sharp fa-solid fa-trash text-white"></i>
                                        <span class="text-white" style="font-weight: bold;">Apagar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Exibir a paginação -->
            <div class="d-flex justify-content-center" style="padding-top: 2em">
                {{ $tipos->links() }}
            </div>
        </div>

        <!-- Usuários -->
        <div class="tab-pane fade show {{ Request::get('tab') == 'usuarios' ? 'active' : '' }}" id="usuarios">
            <div class="row text-black d-flex justify-content-center">
                <div class="col-lg-10">
                    <div class="centralizado">
                        <button type="button" class="main-btn" data-bs-toggle="modal" data-bs-target="#myModal">
                            Adicionar Usuário
                        </button>
                    </div>
                    @foreach ($usuarios as $user)
                        <div class="col-md-6 col-lg-4 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-person-badge" style="font-size: 3rem"> </i>
                                            <div class="ms-3">
                                                <p class="mb-0">
                                                    <strong>ID do usuário:</strong>
                                                    {{ $user->id }}
                                                </p>
                                                <p class="mb-0">
                                                    <strong>Username:</strong>
                                                    {{ $user->username }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                                    <a href='' class='btn btn-link m-0 bg-danger text-reset text-decoration-none'
                                        role="button" data-ripple-color="danger">
                                        <i class="fa-sharp fa-solid fa-trash text-white"></i>
                                        <span class="text-white" style="font-weight: bold;">Apagar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Exibir a paginação -->
            <div class="d-flex justify-content-center" style="padding-top: 2em">
                {{ $usuarios->links() }}
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
