<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sala de Música</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="icon" width="50px" href="/assets/images/icone-site.png">
        
    </head>

    <body>

        @if (Route::has('login'))
            
            <nav class="navbar">

                <div class="d-flex">

                @auth

                    <div class="inicio">

                        <a href="{{ url('/inicio') }}">Início</a>

                    </div>

                </div>
            </nav>
            
        @else
                    
            <nav class="navbar">

                <div class="d-flex">

                    <div class="entrar">

                        <a href="{{ route('login') }}">Entrar</a>

                    </div>

                    @if (Route::has('register'))
                            
                        <div class="criar-conta">

                            <a href="{{ route('register') }}">Criar Conta</a>

                        </div>

                    @endif

                </div>

                @endauth

                </div>

            </nav>

        @endif
        
        <div class="texto-informativo container mx-auto sm:px-6 lg:px-8">

            <h1> Gerenciamento da Sala de Música</h1>
            <p>

                Aqui teremos um controle rigoroso sobre o empréstimo e devolução de equipamentos e da reserva da sala de música evitando perdas e danos, 
                assegurando que todos possam usufruir dos recursos disponíveis. Desta forma, o sistema adquire um local de agendamento eficiente permite que 
                todos os alunos e professores utilizem a sala de forma justa e organizada, evitando conflitos de horários.

            </p>


        </div>

    </body>
    
</html>

<body>
    
<style>

    @import url('https://fonts.googleapis.com/css2?family=Grandstander:ital,wght@0,100..900;1,100..900&display=swap');  

    body{

        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('/assets/images/welcome-imagem1.png');
        background-repeat: no-repeat;
        background-size: cover;

    }

    nav{

        font-family: "Grandstander", cursive;
        text-decoration: none !important;
        float: right;
        margin-right: 2em;

    }

    nav div{

        padding-left: 2em;

    }

    a{

        color: rgb(255, 255, 255) !important;
        text-decoration: none;
        font-size: 20px;

    }
    
    .texto-informativo{

        position: absolute;
        font-family: "Grandstander", cursive;
        text-shadow: 0 3px black;
        justify-content: center;
        text-align: center;
        left: 0;
        right: 0;
        top: 10em;
        height: 20em;
        color:white;
        
    }

    .texto-informativo h1{

        font-size: 120px;
        text-shadow: 0 5px black;
        color: rgb(163, 255, 163);
        border-bottom: 2px solid rgb(208, 255, 212);

    }

    @media (min-width: 900px) and (max-width: 1049px) {

        .texto-informativo h1{

            margin-left: -0.8em;

        }

    }

        @media (min-width: 750px) and (max-width: 899px) {

            .texto-informativo h1{

                font-size: 90px;
                margin-left: -0.8em;

            }

            .texto-informativo p {

                text-shadow: 0 2px black;

            }

        }

        @media (min-width: 600px) and (max-width: 659px) {

            .texto-informativo p{

                font-size: 14px;
                text-shadow: 0 1.5px black;

            }

            .texto-informativo h1{

                margin-top: -1em;
                font-size: 80px;
                margin-left: -0.5em;

            }

        }

        @media (min-width: 450px) and (max-width: 539px) {

            .texto-informativo{

                height: 3em;


            }

            .texto-informativo p{

                font-size: 12px;
                text-shadow: 0 1px black;

            }

            .texto-informativo h1{

                margin-top: -1.5em;
                font-size: 60px;
                margin-left: -0.03em;

            }

        }

        @media (min-width: 300px) and (max-width: 449px) {

            nav{

                text-align: center;

            }

            nav div{

                padding-right: 1em;

            }

            body{

                background-repeat: repeat;
                background-size: 600px 850px;

            }

            .texto-informativo{

                margin-top: 10em;
                height: 3em;

            }

            .texto-informativo p{

                font-size: 15px;
                text-shadow: 0 2px black;

            }

            .texto-informativo h1{

                margin-top: -1.5em;
                font-size: 45px;
                margin-left: -0.03em;

            }
            

        }
    
</style>