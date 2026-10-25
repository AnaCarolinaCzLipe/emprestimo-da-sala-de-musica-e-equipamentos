<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <title>Início</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <header class="header">

        <h1> Sala de Música </h1>

    </header>

    <div class="py-12">

        <div class="conteudo-informativo container-fluid overflow-hidden d-flex justify-content-center">

            <div class="texto-informativo">

                <h2 class="h2-informativo">Sobre o Site:</h2>

                <p>
                    
                    Nosso site oferece uma plataforma de agendamento online, permitindo que alunos e professores reservem a sala de música de maneira rápida 
                    e eficiente, podendo  acompanhar o estado e a disponibilidade de todos os equipamentos e das reservas da sala de música. 
                    Com isso, o sistema envia notificações e lembretes automáticos sobre as reservas, além de multas para caso não siga os prazos.
                    Oferecemos também um serviço de suporte ao usuário e tutorial diretamente pelo site, ajudando a resolver 
                    quaisquer problemas ou dúvidas sobre o uso da sala de música.


                </p>

            </div>

            <div class="ondas-informativo"> 

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#C8F6CE" fill-opacity="1" d="M0,224L48,208C96,192,192,160,288,165.3C384,171,480,213,576,218.7C672,224,768,192,864,197.3C960,203,1056,245,1152,250.7C1248,256,1344,224,1392,208L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
    
            </div>

        </div>


        <div class="conteudo-reservas container-fluid overflow-hidden d-flex justify-content-center"> 

            <div class="texto-informativo">

                <h2 class="h2-reservas">Reservas:</h2>

                <p>
                    
                    A partir da reserva online você poderá fazer seu pedido que será avaliado pelo administrador que assim confirmado poderá usá-la no 
                    horário estabelecido, entretanto, se os dados estiverem incompletos ou confusos terá a possibilidade de que sua reserva seja rejeitada. 
                    Logo, caso o usuário também não cumpra os prazos determinados será adquirido uma multa que o administrador irá limitar.


                </p>
                

                <a href="{{ route('layouts.reservas') }}"><button class="botao-reservas">Reservar!</button></a>
    
                <div class="itens-animados">

                    <img class="chaveanimada" src='../assets/images/chaveanimada.png'/>
    
                    <img class="violaoanimado" src='../assets/images/violaoanimado.png'/>

                </div>

            </div>

            <div class="ondas-reservas"> 

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                    <path fill="#F5DBCB" fill-opacity="1" d="M0,224L48,208C96,192,192,160,288,165.3C384,171,480,213,576,218.7C672,224,768,192,864,197.3C960,203,1056,245,1152,250.7C1248,256,1344,224,1392,208L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
    
            </div>

        </div>

        <div class="conteudo-bandas container-fluid overflow-hidden d-flex justify-content-center"> 

            <div class="texto-informativo">

                <h2 class="h2-bandas" style="margin-bottom:1em;">Bandas:</h2>

                <p>
                    
                    O site terá um serviço de inclusão de bandas do colégio do IFPR para que alunos e professores possam saber melhor sobre as bandas que 
                    tem na escola, e assim, o administrador com os dados fornecidos irá inserir no sistema.
                    Caso algum usuário queira que sua banda seja inserido também, basta mandar o email para reserva.sala.musica@gmail.com.
                    
                </p>

                <div>

                    <a href="{{route("gruposmusicais.inicio-grupos")}}"><button class="botao-bandas">Conheças as Nossas Bandas!</button></a>
    
                </div>

            </div>

            <div class="imagem-banda">

                <img class="banda" src='../assets/images/imagemsalademusica.jpg'/>
                
            </div>

        </div>

    </div>

    @include('footer.footer')

</x-app-layout>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Rammetto+One&display=swap');

    *{

        font-family: "Lexend Deca", sans-serif;
        text-decoration: none !important;
    }

    /* -------------------------------------------------------- Header -------------------------------------------------------- */

    .header{

        display: grid;
        text-align: center;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('../assets/images/foto-sala-musica.jpg');
        background-position: center;
        background-repeat: no-repeat;
        height: 20em;
        background-size: cover;
        border-bottom: 1px solid #423f42;
        margin-top: -3px;

    }

    h1{

        font-family: "Rammetto One", sans-serif;
        font-weight: 400;
        text-shadow: 0 10px rgb(0, 0, 0);
        font-size: 100px;
        margin-top: 0.8em;
        color: rgb(255, 255, 255);
        font-style: normal;

    }

    h2{

        font-family: "Rammetto One", sans-serif;

    }

    /* -------------------------------------------------------- Informações sobre o site -------------------------------------------------------- */

    .conteudo-informativo{

        position: relative; 
        background-color: #7e007e8f;
        height: 55vh;
        margin-top: -3em;
        display: flex;
        padding-left: 5em;
        padding-top: 5em;

    }

    .texto-informativo{

        width: 50em;
        font-weight: 500;
        margin-right: 5em;

    }

    /* 
    .foto {

        width: 450px;
        height: 450px;
        aspect-ratio: 1;
        object-fit: cover;
        --_m: radial-gradient(#000 69%,#0000 70%) 84.5%/50%;
        -webkit-mask-box-image: var(--_m);
        mask-border: var(--_m);
        clip-path: polygon(-41% 0,50% 91%, 141% 0);

    } */

    .h2-informativo{

        margin-bottom: 1em;
        text-shadow: 0 5px rgb(167, 79, 152);

    }

    /* -------------------------------------------------------- Reservas -------------------------------------------------------- */

    .conteudo-reservas{

        position: relative;
        background-color: #00ff152d;
        height: 55vh;
        display: flex;
        padding-left: 5em;
        padding-top: 5em;

    }

    .h2-reservas{

        margin-top: -1em;
        margin-bottom: 1em;
        text-shadow: 0 5px rgb(79, 167, 94);

    }

    .chaveanimada{

        position: absolute;
        margin-left: 20em;
        width: 150px;
        height: 150px;
        animation: chaveanimada 1.5s infinite;

    }

    .violaoanimado{

        position: absolute;
        margin-left: 45em;
        margin-top: -3.5em;
        width: 100px;
        animation: chaveanimada 1.5s infinite;

    }

    .botao-reservas{

        padding: 10px;
        background-color: #91d385;
        width: 10em;
        border-radius: 10px;
        color: rgb(0, 0, 0);
        transition: 0.5s;
        position: relative;
        z-index: 10;

    }

    .botao-reservas:hover{

        background-color: #7cb173;
        transition: 0.5s;

    }

    @keyframes chaveanimada {

        0% {

            transform: rotate(-2deg);

        }

        50% {
            
            transform: rotate(2deg);

        }
        100% {

            transform: rotate(-2deg);

        }

    }


    /* -------------------------------------------------------- Bandas -------------------------------------------------------- */

    .conteudo-bandas{

        position: relative;
        background-color: #ff66002d;
        height: 55vh;
        display: flex;
        padding-left: 5em;
        padding-top: 5em;
        margin-bottom: -2.97em;

    }

    .h2-bandas{

        text-shadow: 0 5px rgb(245, 168, 117);

    }

    .imagem-banda{

        position: relative;

    }

    .banda{

        border-radius: 30px;
        border: 2px solid rgba(0, 0, 0, 0.616);
        width: 600px;
        height: 400px;

    }

    .botao-bandas{

        padding: 10px;
        width: 17em;
        text-align: center;
        border-radius: 10px;
        color: black;
        background-color: #fcc0a9;
        font-weight: 500;
        transition: 0.5s;

    }

    .botao-bandas:hover{

        background-color: rgba(243, 163, 110, 0.89);
        color: black;
        transition: 0.5s;

    }


    /* -------------------------------------------------------- Ondas -------------------------------------------------------- */

    .ondas-informativo{

        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 15.4em;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .ondas-reservas{

        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 16em;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 5;

    }


    /* -------------------------------------------------------- Footer -------------------------------------------------------- */

    footer{

        position: relative;
        background: #23232A;
        width: 100%;
        height: 16em;
        bottom: 0;
        left: 0;
        margin-top: -3em;

    }

    

    /* -------------------------------------------------------- Ajustamento da Tela -------------------------------------------------------- */

    /* 110% */

    	@media (min-width: 1600px) and (max-width: 1799px) {

            .chaveanimada, .violaoanimado{

                margin-top: -4.5em;

            }

            .imagem-banda{

                margin-top: -3em;

            }

        }


        @media (min-width: 1400px) and (max-width: 1599px) {

            .conteudo-reservas{

                height: 30em;

            }

            .chaveanimada, .violaoanimado{

                margin-top: -4.5em;

            } 

            .imagem-banda{

                margin-top: -5em;

            }

        }

    /* ------------------------------ 150% ------------------------------ */
    @media (min-width: 1200px) and (max-width: 1499px) {

        .conteudo-informativo, .conteudo-reservas{

            height: 33em;

        }

        .ondas-informativo,.ondas-reservas{

            margin-bottom: -1em;

        }

        .imagem-banda{

            position: absolute;
            margin-top: 20em;
            margin-left: -6em;

        }

        .banda{

            width:700px;

        }

        .conteudo-bandas{

            display: grid;
            height: 55em;

        }

    }

    /* ------------------------------ 175% ------------------------------ */
    @media (min-width: 1050px) and (max-width: 1199px) { 

        .conteudo-informativo, .conteudo-reservas{

            height: 38em;

        }

        .foto-isis {

            height: 350px;
            width: 350px;
        }

        .texto-informativo{

            width: 50em;

        }

        .itens-animados{

            position: relative;
            bottom: 20em;

        }

        .violaoanimado, .chaveanimada{

            margin-top: 20em;

        }

        .ondas-informativo,.ondas-reservas{

            margin-bottom: -1em;

        }

        .imagem-banda{

            position: absolute;
            margin-top: 20em;
            margin-left: -6em;

        }

        .banda{

            width:700px;

        }

        .conteudo-bandas{

            display: grid;
            height: 55em;

        }

    }

    /* ------------------------------ 200% ------------------------------ */
    @media (min-width: 900px) and (max-width: 1049px) {

        .conteudo-informativo, .conteudo-reservas{

            height: 38em;

        }

        .texto-informativo{

            width: 40em;

        }

        .itens-animados{

            position: relative;

        }

        .violaoanimado{

            margin-left: 35em;

        }

        .chaveanimada{

            margin-left: 9em;

        }


        .ondas-informativo,.ondas-reservas{

            margin-bottom: -1.4em;

        }

        .imagem-banda{

            position: absolute;
            margin-top: 20em;
            margin-left: -6em;

        }

        .banda{

            width:700px;

        }

        .conteudo-bandas{

            display: grid;
            height: 55em;

        }

    }

    /* ------------------------------ 250% ------------------------------ */
    @media (min-width: 750px) and (max-width: 899px) {

        .header{

            height: 25em;

        }

        .conteudo-informativo, .conteudo-reservas{

            height: 30em;

        }

        .texto-informativo{

            width: 40em;

        }

        .ondas-informativo, .ondas-reservas{

            margin-bottom: -2.5em;

        }

        .ondas-reservas{

            margin-bottom: -3em;


        }

        .itens-animados{

            position: relative;

        }

        .violaoanimado{

            margin-left: 35em;
            margin-top: -5em;

        }

        .chaveanimada{

            width: 140px;
            height: 140px;
            margin-top: -4em;

        }


        p{

            font-size: 14px;

        }

        .imagem-banda{

            position: absolute;
            margin-top: 20em;
            margin-left: -4em;

        }

        .banda{

            width:700px;

        }

        .conteudo-bandas{

            display: grid;
            height: 55em;

        }

    }

    /* ------------------------------ 300% ------------------------------ */
    @media (min-width: 600px) and (max-width: 659px) {
        
        .header{

            height: 25em;

        }

        .conteudo-informativo, .conteudo-reservas{

            height: 30em;

        }

        .texto-informativo{

            width: 30em;

        }

        .ondas-informativo{

            margin-bottom: -3.4em;

        }

        .ondas-reservas{

            margin-bottom: -4em;

        }

        .itens-animados{

            position: relative;

        }

        .chaveanimada{

            width: 100px;
            height: 100px;
            margin-left: 10em;

        }

        .violaoanimado{


            margin-left: 25em;
            margin-top: -5em;


        }

        p{

            font-size: 14px;

        }

        .imagem-banda{

            position: absolute;
            margin-top: 20em;
            margin-left: -4em;

        }

        .banda{

            width:700px;

        }

        .conteudo-bandas{

            display: grid;
            height: 55em;

        }

    }

    /* ------------------------------ 400% ------------------------------ */
    @media (min-width: 450px) and (max-width: 539px) {

        .header{

            height: 25em;

        }

        .conteudo-informativo{

            height: 30em;

        }

        .conteudo-reservas{

            height: 22em;

        }

        .conteudo-bandas{

            height: 35em;

        }

        .texto-informativo{

            width: 35em;

        }

        .ondas-informativo{

            margin-bottom: -4.5em;

        }

        .ondas-reservas{

            margin-bottom: -5em;

        }
        .itens-animados{

            position: relative;
            bottom: 20em;

        }

        .chaveanimada{

            position: absolute;
            margin-top: 5em;
            margin-left: -5em;
            width: 70px;
            height: 70px;

        }

        .violaoanimado{

            position: absolute;
            top: 10em;
            width: 60px;
            height: 140px;
            right: -5em;

        }

        p{

            font-size: 10px;

        }

        .imagem-banda{

            position: absolute;
            margin-top: 18em;
            margin-left: -4em;

        }

        .banda{

            width:700px;

        }

        .conteudo-bandas{

            display: grid;
            height: 55em;

        }

        .botao-reservas, .botao-bandas{

            font-size: 12px;

        }

    }

    /* ------------------------------ 500% ------------------------------ */
    @media (min-width: 300px) and (max-width: 449px) {

        .header h1{

            font-size: 70px;

        }

        .conteudo-informativo{

            height: 30em;

        }

        .conteudo-reservas{

            height: 25em;

        }

        .texto-informativo{

            width: 45em;

        }

        .ondas-informativo,.ondas-reservas{

            margin-bottom: -5.5em;

        }

        .itens-animados{

            position: relative;
            bottom: 20em;

        }

        .chaveanimada{

            position: absolute;
            margin-top: 5em;
            margin-left: -5em;
            width: 70px;
            height: 70px;

        }

        .violaoanimado{

            position: absolute;
            top: 10em;
            width: 60px;
            height: 140px;
            right: -5em;

        }

        p{

            font-size: 10px;

        }

        .imagem-banda{

            position: absolute;
            margin-top: 19em;
            margin-left: -4em;

        }

        .banda{

            width:350px;
            height: 300px;

        }

        .conteudo-bandas{

            display: grid;
            height: 45em;

        }

        .botao-reservas, .botao-bandas{

            font-size: 10px;

        }

    }

</style>