@extends('template')

@section('conteudo')
    <style>
        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-title {
            margin-bottom: 0;
        }

        .card-body {
            padding: 20px;
        }
    </style>

    <!-- Titulo -->
    <h1 style="text-align: center">
        <span><i class="fa-solid fa-car-tunnel" style="font-size: 1.2em;"></i></span>
        <div>Vagas</div>
    </h1>

    <!-- Botão de entrada de veiculo -->
    <div class="centralizado">
        <button type="button" class="main-btn" href="" style="margin-top: 1.3em;" data-bs-toggle="modal"
            data-bs-target="#myModal">
            Entrada de Veículo
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

    <!-- Listagem -->
    <div class='row mb-2'>
        @foreach ($vagas as $vaga)
            <div class='col-md-2 d-flex align-items-stretch' style='margin-top: 2rem;'>
                <div class='card col-md-12 text-dark'>
                    <div class='card-header' style='text-align: center;'>
                        <h5 class='card-title'>Vaga #{{ $vaga->id }}</h5>
                    </div>
                    <div class='card-body' style='text-align: center'>
                        @php
                            $cor = $vaga->estado ? 'green' : 'red';
                        @endphp
                        <a class='btn' href=''>
                            <i class='fa-solid fa-car' style='font-size: 4rem; color: {{ $cor }};'></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center" style="padding-top: 2em">
        {{ $vagas->links() }}
    </div>

    <!-- Modal -->
    @include('modals.ticketsModal')
@endsection
