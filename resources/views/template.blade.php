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
            background: #000;
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
        }

        .sidebar li a {
            color: #fff;
        }

        #titulo {
            margin-top: 0.5em;
            margin-bottom: 1.5em;
        }

        #titulo span {
            font-size: 1.2em;
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
        }

        .card:hover {
            transform: scale(1.05);
        }

        .centralizado{
            text-align: center;            
        }

        .main-btn{
            background-color: hsl(207, 98%, 40%);
            box-shadow: 0 5px 0 hsl(207, 94%, 28%);
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
    </style>
</head>

<body>

    <div class="main-container d-flex">
        <div class="sidebar d-flex flex-column" id="side_nav">
            <a href="/"
                class="header-box px-2 pt-3 pb-4 d-flex justify-content-center align-items-center text-decoration-none">
                <h1 class="fs-4" id="titulo">
                    <span class="bg-white text-dark rounded shadow px-2 me-2">Cutu</span>
                    <span class="text-white">Car</span>
                </h1>
            </a>

            <ul class="list-unstyled px-2 flex-column mb-auto">
                <li class="side-items">
                    <a href="/dashboard" class="text-decoration-none px-3 py-2 d-block" aria-current="page">
                        <span><i class="fa-sharp fa-solid fa-gauge"></i></span>
                        Dashboard
                    </a>
                </li>
                <li class="side-items">
                    <a href="/admin?tab=vagas" class="text-decoration-none px-3 py-2 d-block" aria-current="page">
                        <span><i class="fa-solid fa-user-tie"></i></span>
                        Painel Admin.
                    </a>
                </li>
                <li class="side-items">
                    <a href="/vagas" class="text-decoration-none px-3 py-2 d-block">
                        <span><i class="fa-solid fa-car-tunnel"></i></span>
                        Vagas
                    </a>
                </li>
                <li class="side-items">
                    <a href="/carros" class="text-decoration-none px-3 py-2 d-block">
                        <span><i class="fa-solid fa-car"></i></span>
                        Carros
                    </a>
                </li>
                <li class="side-items">
                    <a href="/clientes" class="text-decoration-none px-3 py-2 d-block">
                        <span><i class="fa-solid fa-user-group"></i></span>
                        Clientes
                    </a>
                </li>
                <li class="side-items">
                    <a href="/tickets/ativos" class="text-decoration-none px-3 py-2 d-block">
                        <span><i class="fa-solid fa-ticket"></i></span>
                        Tickets Ativos
                    </a>
                </li>
                <li class="side-items">
                    <a href="/tickets/todos" class="text-decoration-none px-3 py-2 d-block">
                        <span><i class="fa-solid fa-clock-rotate-left"></i></span>
                        Histórico
                    </a>
                </li>
            </ul>

            <hr class="h-color mx-2">

            <ul class="list-unstyled">
                <li class="dropdown">
                    <a href="#" class="text-decoration-none px-3 py-2 d-block" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://avatars.githubusercontent.com/u/14907837?v=4" alt="" width="32"
                            height="32" class="rounded-circle me-2">
                        <strong>
                            @php
                                echo session()->get('logado')->username;
                            @endphp

                        </strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="/deslogar">Deslogar</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <div class="content p5"> @yield('conteudo')

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(function() {
            var currentPath = window.location.pathname; // Obtém o caminho atual da URL

            // Remove os parâmetros de consulta do caminho atual
            currentPath = currentPath.split('?')[0];

            // Percorre cada link da lista
            $(".list-unstyled li").each(function() {
                var link = $(this).find("a");
                var href = link.attr("href");

                // Remove os parâmetros de consulta do href
                href = href.split('?')[0];

                // Verifica se o caminho base atual corresponde ao href do link
                if (currentPath === href) {
                    $(this).addClass("active"); // Adiciona a classe "active" ao link correspondente
                }
            });
        });
    </script>

</body>

</html>
