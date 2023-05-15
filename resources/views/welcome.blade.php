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
            width: 115px;
            height: 115px;
            object-fit: cover;
            animation: fadeIn 0.8s ease-in;
        }

        .image-container {
            margin-right: 6em;
            text-align: center;
        }

        .image-container p {
            font-size: 2em;
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
    </style>

    <h1>
        <i class="bi bi-file-earmark-code-fill" style="font-size: 3rem"></i>
        <div>Projeto de WEB III</div>
    </h1>

    <h2>Integrantes</h2>
    <div class="d-flex justify-content-center">
        <div class="image-container">
            <img class="round-image" src="https://avatars.githubusercontent.com/u/14907837?v=4" alt="Image 1">
            <p>Mateus Seiboth</p>
        </div>
        <div class="image-container">
            <img class="round-image" src="https://avatars.githubusercontent.com/u/117425361?v=4" alt="Image 2">
            <p>Flávio Júnior</p>
        </div>
        <div class="image-container">
            <img class="round-image" src="https://avatars.githubusercontent.com/u/14957082?s=200&v=4" alt="Image 3">
            <p>ChatGPT</p>
        </div>
    </div>

    <h2>Descrição do Projeto</h2>
    <p>
        Este projeto web representa um esforço conjunto da equipe responsável pela disciplina de Construção de Páginas Web
        III, que se empenhou em utilizar as tecnologias mais avançadas para criar um site moderno e funcional. O padrão MVC
        (Model-View-Controller) foi aplicado para aprimorar a organização e a manutenção do
        código fonte, permitindo uma melhor escalabilidade do sistema.
    </p>

    <h2>Tecnologias Utilizadas</h2>
    <div class="d-flex justify-content-center">
        <div class="tech-container">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/postgresql/postgresql-plain.svg" alt="PostgreSQL Logo">
        </div>
        <div class="tech-container">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-plain.svg" alt="PHP Logo">
        </div>
        <div class="tech-container">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/laravel/laravel-plain.svg" alt="Laravel Logo">
        </div>
        <div class="tech-container">
            <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-plain.svg" alt="Bootstrap Logo">
        </div>
    </div>

    <h2>Considerações Finais</h2>
    <p>
        Em resumo, este projeto web representa o comprometimento da equipe de desenvolvimento com a excelência em cada etapa
        do processo de criação de um site, desde a escolha das tecnologias até a implementação dos recursos mais avançados,
        visando proporcionar aos usuários uma experiência única e inesquecível.
    </p>
@endsection
