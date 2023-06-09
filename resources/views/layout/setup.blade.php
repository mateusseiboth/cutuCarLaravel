<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mateus Seiboth and Flávio">
    <title>Carrinhos maravilhosos v0.3</title>


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
            color: #ffffff;
        }

        .main-btn:hover {
            background-color: rgb(2, 112, 202);
            box-shadow: 0 5px 0 rgb(4, 78, 139);
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
            color: #ffffff;
        }

        .link-sem-decoracao:hover .card {
            background-color: #007bff;
        }

        .flex-container {
            display: flex;
            justify-content: center;
        }

        .terminal {
            background-color: black;
            color: lime;
            font-family: monospace;
            padding: 20px;
            white-space: pre;
        }

        /* Estilos CSS para o cursor */
        .cursor {
            animation: blink 1s infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>
</head>

<div class="container col-md-6 " style="margin-top: 2rem">
    <div class="card">
        <h4 class="card-header" style="text-align: center;">
            <span><i class="fa-solid fa-database" style="font-size: 1.2em;"></i></span>
            <div class="">O primeiro passo foi dado</div>
        </h4>

        <div class="card-body">
            <div class="row centralizado" style="margin-top: 1.5em;">
                <p>Atualmente seu banco de dados está com a seguinte configuração de tabelas</p>
            </div>
            <div class="tabelas-banco" style="margin-bottom: 1.5em; display: flex; flex-direction: column; align-items: center;">
                <div class="row">
                    {!! $tabelasFaltantes['carro']
                        ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de carros</i>"
                        : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de carros</i>" !!}
                </div>
                <div class="row">
                    {!! $tabelasFaltantes['cliente']
                        ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de clientes</i>"
                        : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de clientes</i>" !!}
                </div>
                <div class="row">
                    {!! $tabelasFaltantes['ticket']
                        ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de tickets</i>"
                        : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de tickets</i>" !!}
                </div>
                <div class="row">
                    {!! $tabelasFaltantes['tipo']
                        ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de tipos</i>"
                        : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de tipos</i>" !!}
                </div>
                <div class="row">
                    {!! $tabelasFaltantes['vaga']
                        ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de vagas</i>"
                        : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de vagas</i>" !!}
                </div>
                <div class="row">
                    {!! $tabelasFaltantes['userExist']
                        ? "<i class='fa-solid fa-circle-check' style='color: green; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de usuarios</i>"
                        : "<i class='fa-solid fa-circle-xmark' style='color: #ff0000; font-size: 0.75rem;  margin-bottom: 1rem; margin-top: 1rem;'>Tabela de usuarios</i>" !!}
                </div>
            </div>

            <div class="row col-md-12 card-footer">
                <div class="row">

                    <p class="centralizado">Ao avançar, tabelas serão criadas automaticamente com registros iniciais.</p>
                    <div style="padding-left: 3em;">
                        <input type="checkbox" id="osshiro-checkbox">
                        <label for="osshiro-checkbox">Sou o Osshiro</label>
                        <p class="text-muted">Obs: Osshiro (release de entrega) cadastra dois itens por tabela.</p>
                    </div>
                </div>


                {{-- <div class="row col-md-4">
                    <a href="{{ url()->previous() }}" type="button" class="main-btn btn bg-danger">
                        Voltar
                    </a>
                </div> --}}
                <div class="centralizado">
                    <a type="button" class="main-btn btn text-white centralizado"
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

    @if (request()->path() != 'assistant/checkSuccess')
        <div class="modal fade" id="asciiModal" tabindex="-1" aria-labelledby="asciiModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="terminal" id="terminal">
                            <pre style="color: green">
 _____      _          _____              _____                 _
 / ____|    | |        / ____|            / ____|               (_)
| |    _   _| |_ _   _| |     __ _ _ __  | (___   ___ _ ____   ___  ___ ___
| |   | | | | __| | | | |    / _` | '__|  \___ \ / _ \ '__\ \ / / |/ __/ _ \
| |___| |_| | |_| |_| | |___| (_| | |     ____) |  __/ |   \ V /| | (_|  __/
\_____\__,_|\__|\__,_|\_____\__,_|_|    |_____/ \___|_|    \_/ |_|\___\___|

                  </pre>




                            <p style="color: rgb(0, 255, 0)">Booting database...</p>
                            <pre style="color: rgb(0, 255, 0)" class="cursor">
_
                </pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>


    <script>
        var url = window.location.href;
        var relevantPart = url.substring(url.indexOf("/assistant"));

        // Verificar se a URL contém "/assistant/check" e não contém "/assistant/checkStatus"
        if (!relevantPart.includes("/assistant/checkStatus")) {
            // Mostrar a modal
            var asciiModal = new bootstrap.Modal(document.getElementById('asciiModal'));
            asciiModal.show();

            // Aguardar 2 segundos antes de fechar a modal
            setTimeout(function() {
                asciiModal.hide();
            }, 4000);
        }
    </script>


<script>
    const checkbox = document.getElementById('osshiro-checkbox');

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            // Definir cookie com o nome "meu-cookie" e valor "true" com validade de 1 ano
            document.cookie = "osshiroSan=true; expires=Thu, 01 Jan 2024 00:00:00 UTC; path=/;";
        } else {
            // Remover cookie definindo uma data de validade passada
            document.cookie = "osshiroSan=false; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }
    });
</script>
</div>
