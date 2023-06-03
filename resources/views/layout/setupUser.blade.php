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

        .main-btn-vermelho {
            background-color: rgb(202, 49, 2);
            box-shadow: 0 5px 0 rgb(145, 36, 3);
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

        .main-btn-vermelho:active {
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

@if($usuario  === true)
<div class="container col-md-6 centralizado" style="margin-top: 1rem">
    <div class="card">
        <div class="card-header">
            <h4 style="text-align: center;">
                <span><i class="fa-solid fa-user-secret" style="font-size: 1.2em;"></i></span>
                <div>Parece que você já tem um usuário</div>
            </h4>
        </div>


        <div class="card-body">


            <p class="card-text mt-2">Apenas avance essa etapa</p>

            <div class="row col-md-4 ms-auto me-auto text-center ">
                <a type="button" class="link-sem-decoracao" href="{{route('success')}}">
                    <i class="fa-solid fa-circle-arrow-right fa-2xl" style="color: rgb(2, 112, 202);"></i>
                </a>
            </div>


        </div>



    </div>
</div>

@else
<div class="container col-md-6 centralizado" style="margin-top: 2rem">
    <div class="card">
        <h4 class="card-header" style="text-align: center;">
            <span><i class="fa-solid fa-user-secret" style="font-size: 1.2em;"></i></span>
            <div class="">Mas um passo só não cria sistema</div>
        </h4>
        <div class="card-body">
            <div class="row">
                <p>Precisamos que você crie um usuário inicial (que será o administrador do sistema)</p>
            </div>
            <div class="row">
                <form method="POST" action="{{ route('createFirstUser') }}" id="form-usuario"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de Usuário:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Informe o nome de usuário" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Informe a senha" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Imagem:</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage()">
                    </div>

                    <!-- Exibição da imagem -->
                    <div class="mb-3" id="image-preview-container" style="display: none;">
                        <img id="image-preview" src="#" alt="Pré-visualização da Imagem"
                            style="max-width: 100%; height: auto;">
                    </div>

                    <div class="row col-md-12 card-footer">
                        <div class="row">
                            <p>Não se preocupe, cuidaremos de tudo e logo terá o CutuCAR atualizado.</p>
                        </div>
                        <div class="row col-md-4">
                            <a href="{{ url()->previous() }}" type="button" class="main-btn-vermelho btn bg-danger text-white">
                                Voltar
                            </a>
                        </div>
                        <div class="row col-md-4 ms-auto text-end">
                            <button type="submit" class="main-btn btn btn-primary">Cadastrar</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>



    </div>
</div>
@endif

<script>
    function previewImage() {
        var previewContainer = document.getElementById('image-preview-container');
        var previewImage = document.getElementById('image-preview');
        var fileInput = document.getElementById('image');

        previewContainer.style.display = 'block';

        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            previewImage.setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(file);
    }
</script>
</html>
