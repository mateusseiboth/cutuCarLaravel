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
        <div class="card-header">
            <h4 style="text-align: center;">
                <span><i class="fa-solid fa-car-on" style="font-size: 1.2em;"></i></span>
                <div>E sem mais delongas...</div>
            </h4>
        </div>


        <div class="card-body">
            <div class="sucesso" style="margin-top: 2em; margin-bottom: 2em;">
                <i class="fa-sharp fa-solid fa-circle-check" style="color: #00ff1e; font-size: 5em;"></i>
                <h1 class="card-title mt-2 mb-4"> Tudo certo!</h1>
            </div>

            <hr>
            <p class="card-text mt-2">Obrigado por escolher o CutuCAR! Clique abaixo para continuar e ir para a tela de login.</p>

            <div class="row col-md-4 ms-auto me-auto text-center ">
                <a type="button" class="link-sem-decoracao" href="{{ route('login') }}">
                    <i class="fa-solid fa-circle-arrow-right" style="color: rgb(2, 112, 202); font-size: 3em"></i>
                </a>
            </div>


        </div>



    </div>
</div>
