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

    <style>
        .bi {
            fill: currentColor;
        }
    </style>
</head>


<body onload="carregarTema()">
    <div class="bg-dark text-white d-flex" style="height: 100%">
        <div class="d-flex flex-column flex-shrink-0 p-2 text-white bg-primary" style="width: 13%;">
            <div class="row text-center">
                <a href="/"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <i class="bi me-4 bi-house-fill" style="font-size: 40px">
                        <span class="fme-4 s-4">Cutucar</span>
                    </i>
                </a>
            </div>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item ">
                    <a href="/admin" class="nav-link text-white" aria-current="page">
                        <i class="me-2 bi bi-wrench-adjustable" style="font-size: 20px"></i>
                        Painel Admin.
                    </a>
                </li>
                <li>
                    <a href="/vagas" class="nav-link text-white">
                        <i class="me-2 bi bi-p-circle" style="font-size: 20px"></i>
                        Vagas
                    </a>
                </li>
                <li>
                    <a href="/carros" class="nav-link text-white">
                        <i class="me-2 bi bi-car-front" style="font-size: 20px"></i>
                        Carros
                    </a>
                </li>
                <li>
                    <a href="/clientes" class="nav-link text-white">
                        <i class="me-2 bi bi-person" style="font-size: 20px"></i>
                        Clientes
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="me-2 bi bi-ticket-perforated" style="font-size: 20px"></i>
                        Tickets Ativos
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="me-2 bi bi-ticket-detailed" style="font-size: 20px"></i>
                        Todos os tickets
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <i class="me-2 bi bi-person-badge" style="font-size: 20px"></i>
                        Cadastrar Usuário
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://avatars.githubusercontent.com/u/14907837?v=4" alt="" width="32"
                        height="32" class="rounded-circle me-2">
                    <strong>Username</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>

        <main class="container-fluid mb-1">
            <div class="p-5 container mt-4" id="border-main">
                @yield('conteudo')
            </div>
        </main>
    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3">
        <span class="col-md-4 mb-0 text-muted">© 2023 CutuCar, Inc</span>
        <ul class="nav mb-0 col-md-4 justify-content-end">
            <li class="nav-item ms-3 px-1 "><i class="bi bi-database">v1.0-postgres</i></li>
            <li class="nav-item ms-3 px-1 "><i class="bi bi-file-diff">v0.2-laravel</i></li>
            <li class="nav-item ms-3 px-1 "><a href="#" class="text-muted"><i
                        class="bi bi-github">Github</i></a></li>
        </ul>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>

</body>


</html>
