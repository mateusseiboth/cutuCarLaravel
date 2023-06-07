<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/navbar-fixed/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ public_path('favicon.png') }}">
    <style>
        * {
            font-family: arial, sans-serif;
        }

        h1 {
            font-size: 3rem;
            text-align: center;
        }

        .titulo {
            font-size: 3rem;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        p {
            margin-top: 0.1rem;
            margin-bottom: 0.1rem;
        }

        th,
        td {
            border: solid 1px gray;
            padding: 0.5rem;
            font-size: 1.5rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="col-md-12">
        <div class="row">
            <div class="d-flex align-items-center">
                <img src="{{ public_path('favicon.png') }}" alt="Logo" class="logo">
                <span id="cutu" class="bg-white rounded shadow px-2 titulo">CutuCar</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6 ">
                <p class="ms-4"><strong>Rua</strong> Osshiro a nota é</p>
                <p class="ms-4"><strong>Número</strong> 10</p>
                <p class="ms-4"><strong>Bairro</strong> Aprovação total</p>
                <p class="ms-4"><strong>Telefone</strong> (67) 9 9876-1817</p>
            </div>
        </div>
    </div>
</br>
</br>
    <div class="row d-flex align-items-center">
        <span id="cutu" class="mx-auto text-center shadow px-2 titulo">Relatório de Tickets</span>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Placa do Carro</th>
                <th>Hora de Entrada</th>
                <th>Hora de Saida</th>
                <th>Total Pago</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->carro->cliente->nome }}</td>
                    <td>{{ $ticket->carro->placa }}</td>
                    <td> {{ date('d/m H:i', strtotime($ticket->hora_entrada)) }}</td>
                    <td>{{ date('d/m H:i', strtotime($ticket->hora_saida)) }}</td>
                    <td>{{ $ticket->total_pago }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-5YbLrQk+xMc5Zd51zloWh6ZvYxMjjgzba3QmQNJrN1DXET7nngeNCGbX81nK5zjZ" crossorigin="anonymous">
    </script>
</body>

</html>
