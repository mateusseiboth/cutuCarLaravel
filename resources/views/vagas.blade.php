@extends('template')

@section('conteudo')
    <h1 style="text-align: center">
        <i class="bi bi-binoculars-fill" style="font-size: 3rem"></i>
        <div>Visão Geral</div>
    </h1>

    <div class="centralizado">
        <button type="button" class="main-btn" href="" style="margin-top: 1.3em;">
            Entrada de veiculo
        </button>
    </div>

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
                        <a class='btn' href=''><i class='bi bi-car-front-fill'
                                style='font-size: 4rem; color: {{ $cor }};'></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Paginação -->
    <div class="d-flex justify-content-center" style="padding-top: 2em">
        {{ $vagas->links() }}
    </div>
@endsection
