@extends('template')

@section('conteudo')
    <style>
        h1 {
            text-align: center;
            margin-bottom: 1em;
        }

        h2 {
            margin-bottom: 20px;
        }

        .round-image {
            border-radius: 50%;
            width: 110px;
            height: 110px;
            object-fit: cover;
            animation: fadeIn 0.8s ease-in;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .image-container {
            margin-right: 6em;
            text-align: center;
        }

        .image-container p {
            font-size: 1.5em;
        }

        .tech-container {
            margin-right: 3em;
            width: 80px;
            height: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .link-sem-decoracao {
            color: #000;
            text-decoration: none;
            transition: background-color 0.3s;
        }
    </style>

    <h1>
        <i class="fa-solid fa-circle-info" style="font-size: 3rem"></i>
        <div>Projeto de WEB III</div>
    </h1>

    <h2>Integrantes</h2>
    <div class="d-flex justify-content-center">
        <div class="image-container">
            <a class="text-decoration-none text-black" href="https://github.com/mateusseiboth">
                <img class="round-image" src="https://avatars.githubusercontent.com/u/14907837?v=4" alt="Image 1">
                <p>Mateus Seiboth</p>
            </a>
        </div>
        <div class="image-container">
            <a class="text-decoration-none text-black" href="https://github.com/flaviojrdev">
                <img class="round-image" src="https://avatars.githubusercontent.com/u/117425361?v=4" alt="Image 2">
                <p>Flávio Júnior</p>
            </a>
        </div>
        <div class="image-container">
            <a class="text-decoration-none text-black" href="https://github.com/openai">
                <img class="round-image" src="https://avatars.githubusercontent.com/u/14957082?s=200&v=4" alt="Image 3">
                <p>ChatGPT</p>
            </a>
        </div>
    </div>

    <h2>Descrição do Projeto</h2>
    <p>
        Este projeto web foi desenvolvido pela equipe responsável pela disciplina de Construção de Páginas Web III,
        utilizando o framework Laravel. Implementamos o padrão MVC do Laravel para melhorar a organização e manutenção do
        código. Continuaremos aprimorando o projeto para oferecer a melhor experiência aos usuários.
    </p>

    <h2>Tecnologias Utilizadas</h2>
    <div class="d-flex justify-content-center">
        <div class="tech-container">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-plain.svg"
                alt="PostgreSQL Logo">
        </div>
        <div class="tech-container">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-plain.svg" alt="PHP Logo">
        </div>
        <div class="tech-container">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" alt="Laravel Logo">
        </div>
        <div class="tech-container">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-plain.svg"
                alt="Bootstrap Logo">
        </div>
    </div>

    <h2>Repositório no Github</h2>
    <div class="image-container">
        <a class="text-decoration-none text-black" href="https://github.com/mateusseiboth/cutuCarLaravel">
            <img class="round-image"
                src="https://raw.githubusercontent.com/devicons/devicon/master/icons/github/github-original.svg"
                alt="link do github">
            <p>Ver o projeto</p>
        </a>
    </div>
@endsection
