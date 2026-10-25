<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Reservas</title>

    <div class="conteiner hidden" id="carregarConteiner">

        <div class="col-12">

            <div class="sessao-header">

                <h1>Reservas</h1>

            </div>

        </div>

        <div class="reservas-card">

            <div class="card">

                <div class="card-img-wrapper">

                    <img src="../assets/images/reserva-foto-sala.jpg">

                </div>

                <div class="card-info">

                    <h2>Sala de Música</h2>

                    <p>

                        Plataforma para o agendamento online, permitindo que alunos e professores reservem a sala de música de maneira rápida e eficiente.

                    </p>

                    <a href="{{ route('emprestimochave.index') }}"><button class="btn">Reservar</button></a>

                </div>

            </div>

            <div class="card">

                <div class="card-img-wrapper">

                    <img src="../assets/images/reserva-foto-equipamento.jpeg">

                </div>

                <div class="card-info">

                    <h2>Equipamento</h2>

                    <p>
                        
                        Nosso site permite que você reserve equipamentos específicos da sala de música, 
                        garantindo que tudo o que você precisa estará disponível no momento da sua sessão.
                    
                    </p>

                    <a href="{{ route('solicitacoes.index') }}"><button class="btn">Reservar</button></a>

                </div>

            </div>

        </div>

    </div>

    @include('footer.footer')

</x-app-layout>


<style>

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');

    * {

        box-sizing: border-box;
        text-decoration: none !important;

    }

    .main{

        background-color: #c5ffcf;

    }

    .conteiner{

        margin-top: -1px;
        min-height: 120vh;
        background-color: #c5ffcf;

    }

    h5{

        padding-bottom: 50px;
        color: black;
        font-size: 50px;

    }

    h1{
        
        margin-top: 40px;
        text-align: center;

    }

    #text p{

        text-align: justify;
        font-size: large;
        margin: 90px;

    }

    #picture img{

        border-radius: 50%;
        height: 40%;
        margin: 90px;

    }

    #header-img img{

        opacity: 80%;

    }

    .sessao-header {

        display: flex;
        align-items: center;
        justify-content: center;

    }

    .sessao-header h1 {

        font-family: var(--font-primary);
        font-size: 3rem;
        color: #4b4b4b;
        border-bottom: solid 3px #005f05;
        margin-bottom: 2rem;

    }

    .reservas-card {

        display: flex;
        justify-content: space-evenly;
        margin-top: 2em;

    }

    .card {

        position: relative;
        border: none;
        background-color: transparent;

    }

    .card-info {

        position: absolute;
        bottom: 0;
        opacity: 0;
        visibility: hidden;
        padding: 1rem;
        text-shadow: 0.3rem 0.2rem 0.3rem rgba(0, 0, 0, 0.6);
        transition: all .3s;

    }

    .card-info h2 {

        font-family: var(--font-primary);
        font-size: 2rem;
        font-weight: 500;
        color: #eeeeee;

    }

    .card-info p {

        font-family: var(--font-secondary);
        font-weight: 400;
        color: #eeeeee;
        width: 80%;
        margin-bottom: 2rem;

    }

    .card-info button {

        width: 8rem;
        height: 2.5rem;
        background: #02bd21;
        background: -webkit-linear-gradient(to right, #02bd21, #016411);
        background: linear-gradient(to right, #02bd21, #016411);
        font-family: var(--font-action);
        color: #eeeeee;
        border-radius: .5rem;
        border: none;
        font-weight: 500;
        box-shadow: 0 .1rem .8rem rgba(0, 0, 0, .4);
        cursor: pointer;

    }

    .card-info button:hover{

        color: black;
        transition: 0.5s;
        font-weight: 500;
        background: -webkit-linear-gradient(to right, #016411, #02bd21);
        background: linear-gradient(to right, #016411, #02bd21);

    }

    .card:hover .card-info {

        bottom: 2rem;
        opacity: 1;
        visibility: visible;

    }

    .card-img-wrapper {

        width: 100%;
        height: 100%;
        border: 3px solid #ccc;
        background-color: #262626;
        border-radius: 10px;

    }

    .card-img-wrapper img {

        object-fit: cover;
        height: 100%;
        width: 100%;
        border-radius: .5rem;
        opacity: .8;
        transition: opacity .3s;

    }

    .card:hover .card-img-wrapper img {

        opacity: .5;

    }

    @keyframes zoom {

        0% {

            transform: scale(1.3);
        
        }

        100% {

            transform: scale(1);

        }
    }

    @keyframes moveBanner {

        0% {

            transform: translateY(10rem) rotateY(-30deg);

        }

        100% {

            transform: translateY(0) rotateY(0);
            
        }
    }

    @media (min-width: 1400px) and (max-width: 1599px) {

        .reservas-card{

            gap: 0.5em;
            margin: 1em;

        }

    }

    @media (min-width: 1200px) and (max-width: 1499px) {

        .reservas-card{

            display: grid;
            margin-bottom: 20em;

        }

        .card{

            width: 70em;
            height: 76%;

        }

    }

    @media (min-width: 1050px) and (max-width: 1199px) {

        .reservas-card{

            display: grid;
            margin-bottom: 10em;

        }

        .card{

            width: 65em;
            height: 70%;

        }

    }

    @media (min-width: 900px) and (max-width: 1049px) {

        .reservas-card{

            display: grid;
            margin-bottom: 10em;

        }

        .card{

            width: 57em;
            height: 70%;

        }  

    }

    @media (min-width: 750px) and (max-width: 899px) {

        .reservas-card{

            display: grid;
            margin-bottom: 10em;

        }

        .card{

            width: 45em;
            height: 70%;

        }    

    }

    @media (min-width: 600px) and (max-width: 659px) {

        .reservas-card{

            display: grid;
            margin-bottom: 10em;

        }

        .card{

            width: 37em;
            height: 70%;

        } 

        .card-info p {

            font-size: 11px;

        }

        .card-info h2{

            font-size: 23px;

        }

        .card-info button {

            font-size: 12px;
            width: 7rem;
            height: 2rem;

        }

    }

    @media (min-width: 450px) and (max-width: 539px) {

        .reservas-card{

            display: grid;
            margin-bottom: 10em;

        }

        .card{

            width: 28em;
            height: 70%;

        } 

        .card-info p {

            font-size: 10px;

        }

        .card-info h2{

            font-size: 20px;

        }

        .card-info button {

            font-size: 12px;
            width: 6rem;
            height: 1.7rem;

        }

        .card-info{

            margin-bottom: -2em;

        }


    }


    @media (min-width: 300px) and (max-width: 449px) {

        .reservas-card{

            display: grid;
            margin-bottom: 5em;

        }

        .card{

            width: 22em;
            height: 70%;

        } 

        .card-info p {

            font-size: 10px;

        }

        .card-info h2{

            font-size: 16px;

        }

        .card-info button {

            font-size: 9px;
            width: 5rem;
            height: 1.5rem;

        }

        .card-info{

            margin-bottom: -2em;

        }

    }

</style>

<script>
    
    document.addEventListener("DOMContentLoaded", function() {

        var mainContainer = document.getElementById('carregarConteiner');

        if (mainContainer) 
        {

            mainContainer.classList.remove('hidden');
            
        }

    });

</script>