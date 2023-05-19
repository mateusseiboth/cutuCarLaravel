<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mateus Seiboth and Flávio">
    <title>Carrinhos maravilhosos v0.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background: #eee;
        }

        #side_nav {
            background: rgb(2, 112, 202);
            min-width: 250px;
            max-width: 250px;
        }

        .content {
            min-height: 100vh;
            width: 100%;
            padding-left: 10em;
            padding-right: 10em;
            padding-top: 2em;
        }

        hr.h-color {
            background: #eee;
        }

        .sidebar li.active {
            background: #eee;
            border-radius: 8px;
        }

        .sidebar li.active a,
        .sidebar li.active a:hover {
            color: #000;
            background: #fff;
            border-radius: 8px;
        }

        .sidebar li a {
            color: #fff;
            transition: all 0.3s;
        }

        .sidebar li a:hover {
            background: rgb(35, 150, 245);
            border-radius: 8px;
        }

        #titulo {
            margin-top: 0.5em;
            margin-bottom: 1.5em;
        }

        #titulo span {
            font-size: 1.5em;
        }

        #cutu {
            color: rgb(2, 112, 202)
        }

        .side-items {
            margin-bottom: 0.5em;
            font-size: 1.1em;
        }

        .side-items span {
            margin-right: 0.5em;
        }

        .card {
            animation: appear 400ms backwards;
            transition: all 300ms;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border: none;
        }


        .centralizado {
            text-align: center;
        }

        .main-btn {
            background-color: rgb(2, 112, 202);
            box-shadow: 0 5px 0 rgb(4, 78, 139);
            margin-bottom: 1.3em;
            width: 400px;
        }

        button {
            font-weight: bold;
            border-radius: 16px;
            padding: 12px 16px;
            transition: all 0.1s;
            border: none;
            color: #fff;
        }

        .main-btn:active {
            box-shadow: none;
            transform: translateY(5px);
        }



        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(100px);
            }
        }

        .link-sem-decoracao {
            color: #000;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .link-sem-decoracao:hover {
            color: #fff;
        }

        .link-sem-decoracao:hover .card {
            background-color: #007bff;
        }

        .flex-container {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<div class="container col-md-6 centralizado" style="margin-top: 1rem">
    <div class="card">
        <h4 class="card-header" style="text-align: center;">
            <span><i class="fa-solid fa-database" style="font-size: 1.2em;"></i></span>
            <div class="">O primeiro passo nós demos</div>
        </h4>



        <div class="card-body">
            <div class="row">
                <p>Atualmenta seu banco de dados está com a seguinte configuração de tabelas</p>
            </div>
            <div class="row">
                {!! $tabelasFaltantes['carro']
                    ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de carros</i>"
                    : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de carros</i>" !!}
            </div>
            <div class="row">
                {!! $tabelasFaltantes['cliente']
                    ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de clientes</i>"
                    : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de clientes</i>" !!}
            </div>
            <div class="row">
                {!! $tabelasFaltantes['ticket']
                    ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de tickets</i>"
                    : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de tickets</i>" !!}
            </div>
            <div class="row">
                {!! $tabelasFaltantes['tipo']
                    ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de tipos</i>"
                    : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de tipos</i>" !!}
            </div>
            <div class="row">
                {!! $tabelasFaltantes['vaga']
                    ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de vagas</i>"
                    : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de vagas</i>" !!}
            </div>
            <div class="row">
                {!! $tabelasFaltantes['userExist']
                    ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de usuarios</i>"
                    : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 1rem; margin-bottom: 1rem; margin-top: 1rem;'>Tabela de usuarios</i>" !!}
            </div>

            <div class="row col-md-12 card-footer">
                <div class="row">
                    <p>Ao clicar em avançar você irá criar as tabelas faltantes de forma automática. Além disso será feita a inserção dos registros iniciais</p>
                    <p class="text-muted">Obs: Para o caso do Osshiro (release de entrega) a inserção faz o cadastro de dois itens de cada tabela</p>
                </div>


                <div class="row col-md-4">
                    <a href="{{ url()->previous() }}" type="button" class="main-btn btn bg-danger">
                        Voltar
                    </a>
                </div>
                <div class="row col-md-4 ms-auto text-end">
                    <a type="button" class="main-btn btn"
                        @php
                            if($tabelasFaltantes['vaga'] && $tabelasFaltantes['userExist']
                                && $tabelasFaltantes['ticket']
                                && $tabelasFaltantes['tipo']
                                && $tabelasFaltantes['cliente']
                                && $tabelasFaltantes['carro']) {
                                echo "href='" . route('firstUser') . "'";
                            } else {
                                echo "href='" . route('criarTabela') . "'";
                            } @endphp>
                        Avançar
                    </a>
                </div>
            </div>

        </div>




    </div>
</div>
