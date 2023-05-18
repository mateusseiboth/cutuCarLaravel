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
                href="{{ route('admin', ['tab' => 'tipos']) }}">Tipos de Cobrança</a>
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
                <div class="">
                    <!-- Botão de criação de vaga -->
                    <div class="centralizado">
                        <form method="POST" action="{{ route('vagas.criar') }}">
                            @csrf
                            <button type="submit" class="main-btn">
                                Adicionar Vaga
                            </button>
                        </form>
                    </div>
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
                    <!-- Listagem -->
                    <div class="row">
                        @foreach ($vagas as $vaga)
                            <div class="col-md-4 mb-2">
                                <div class="card flex">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="d-flex align-items-center">
                                                <span><i class="fa-solid fa-car" style="font-size: 3rem;"></i></span>
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
                <div class="row">
                    <div class="centralizado">
                        <button type="button" class="main-btn" data-bs-toggle="modal" data-bs-target="#modalTipos">
                            Adicionar Tipo de Cobrança
                        </button>
                    </div>
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
                </div>
                <div class="row">
                    @foreach ($tipos as $tipo)
                        <div class="col-md-6 col-lg-4 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-dollar-sign" style="font-size: 3rem"> </i>
                                            <div class="ms-3">
                                                <p class="mb-0">
                                                    <strong>Tipo de cobrança:</strong>
                                                    {{ $tipo->descr }}
                                                </p>
                                                <p class="mb-0">
                                                    <strong>Preço:</strong>
                                                    {{ $tipo->preco }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer border-0 bg-light p-2 d-flex justify-content-around">
                                    <form action="{{ route('tipo.delete', $tipo->id) }}" method="POST"
                                        onsubmit="return confirm('Tem certeza de que deseja excluir este tipo de cobrança?')">
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
            <!-- Exibir a paginação -->
            <div class="d-flex justify-content-center" style="padding-top: 2em">
                {{ $tipos->links() }}
            </div>
        </div>
        <!--Modal de inserção de tipos de cobrança-->
        @include('modals.tiposModal')

        <!-- Usuários -->
        <div class="tab-pane fade show {{ Request::get('tab') == 'usuarios' ? 'active' : '' }}" id="usuarios">
            <div class="row text-black d-flex justify-content-center">
                <div class="row">
                    <div class="centralizado">
                        <button type="button" class="main-btn" data-bs-toggle="modal" data-bs-target="#modalUsuarios">
                            Adicionar Usuário
                        </button>
                    </div>
                    @foreach ($usuarios as $user)
                        <div class="col-md-6 col-lg-4 mb-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="d-flex align-items-center">
                                            @if ($user->image)
                                                @php
                                                    $imageData = stream_get_contents($user->image);
                                                    $base64 = base64_encode($imageData);
                                                @endphp
                                                <img src="data:image/jpeg;base64,{{ $base64 }}"
                                                    alt="Imagem do usuário" class="user-image">
                                            @endif
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
        <!-- Modal de inserção de usuários -->
        @include('modals.usuariosModal')
    @endsection
