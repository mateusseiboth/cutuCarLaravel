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
        .gradient-custom-2 {
            /* fallback for old browsers */
            background: #fccb90;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
        }

        @media (min-width: 768px) {
            .gradient-form {
                height: 100vh !important;
            }
        }

        @media (min-width: 769px) {
            .gradient-custom-2 {
                border-top-right-radius: .3rem;
                border-bottom-right-radius: .3rem;
            }
        }
    </style>

</head>

<body>
    <section class="h-100 gradient-form"  style="background-image: url('{{ asset('images/dark-theme.jpg') }}');">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <i class="bi bi-shield-check" style="font-size: 5rem;"></i>
                                        <h4 class="mt-1 mb-5 pb-1 mt-3">We are the "Confia" team</h4>
                                    </div>
                                    <form action="{{url('login/')}}" method="POST">
                                        @csrf
                                        <p>Por favor, faça login para continuar</p>
                                        <div class="form-outline mb-4">
                                            <input name="username" type="text" id="form2Example11" class="form-control"
                                                placeholder="Username fornecido pelo administrador" />
                                            <label class="form-label" for="form2Example11">Username</label>

                                        </div>

                                        <div class="form-outline mb-4">
                                            <input name="password" type="password" placeholder="Senha fornecida pelo administrador"
                                                id="form2Example22" class="form-control" />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">Entrar</button>
                                            <a class="text-muted" href="#!">Esqueceu a senha?</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Somos mais que uma dupla, somos dois</h4>
                                    <p class="small mb-0">Juntando o conhecimento do Flávio em faltar aulas e a baixa
                                        capacidade
                                        cognitiva do Mateus, formamos uma dupla que não tem medo de nada, nem de
                                        ninguém.
                                    </p>
                                    <p class="small mb-0">Desenvolvemos esse projeto utilizando suor, sangue, lagrimas e
                                        muito café.
                                        Nosso objetivo é entregar um projeto que atenda as necessidades do trabalho para
                                        que não sejamos reprovados.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
</body>
