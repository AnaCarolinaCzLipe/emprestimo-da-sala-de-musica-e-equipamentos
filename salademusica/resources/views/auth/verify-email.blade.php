<body>

    <title>Verificar Email</title>

    <link rel="icon" width="50px" href="/assets/images/icone-site.png">

    <div class="container">

        <div class="imagens">

            <div class="imagens-div">

                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                    <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2zm-2 9.8V4.698l5.803 3.546zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.5 4.5 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586zM16 9.671V4.697l-5.803 3.546.338.208A4.5 4.5 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671"/>
                    <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 16">
                    <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
                </svg>

            </div>

        </div>

        <div class="form">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <div class="sair-button">

                    <button>

                        <span>Sair</span>

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                        </svg>

                    </button>

                </div>
                
            </form>
            
            <div class="texto">

                <h2>Verificação de Email</h2>

                <div>

                    {{ __('Seu registro foi guardado com sucesso! Porém, antes de prosseguir com seu cadastro, precisamos verificar seu email, que por meio dele, entraremos em contato
                    em algumas situações. Clique no botão abaixo para verificar.') }}

                </div>
            

                @if (session('status') == 'verification-link-sent')

                    <div style="margin-top: 1em; font-weight: 500;">

                        {{ __('Um novo link foi direcionado para seu email, dê uma olhada em seus emails.') }}
                        
                    </div>

                @endif

            </div>

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div class="continue-button">
                        <x-primary-button>
                            {{ __('Reenviar verificação de email') }}
                        </x-primary-button>
                    </div>
            </form>

            </div>

        </div>
        
    </div>

</body>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');

    * {

        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;
        
    }
    body{

        display: flex;
        justify-content: center;
        align-items: center;
        background: #C5EBAA;

    }

    .container{

        width: 70em;
        height: 30em;
        display: flex;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);

    }

    .form{

        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        padding: 3rem;
        text-align: center;
    }

    h2{

        margin-bottom: 10px;

    }
    .texto{

        padding:10px;
        margin-bottom: 2em;

    }

    .imagens{

        width: 50%;
        display: flex;
        flex-direction: flex;
        gap:10px;
        justify-content: center;
        align-items: center;
        background-color: #a1e2a1;
        padding: 3rem;

    }

    .continue-button button {

        width: 100%;
        border: none;
        color: white;
        font-size: 16px;
        background-color: #7ABA78;
        padding: 0.62rem;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.5s;

    }

    .continue-button button:hover {

        background-color: #3b9738;
        transition: 0.5s;

    }

    .sair-button button{

        position: relative;
        background-color: transparent;
        border: none;
        cursor: pointer;
        text-decoration: underline;
        top: 3.2em;
        left: 12em;
        padding: 10px;
        border-radius: 10px;
        text-decoration: none;
        color: white;
        background-color: #7ABA78;
        transition: 0.5s;

    }

    .sair-button button:hover{

        transition: 0.5s;
        background-color: #3b9738;

    }
    .sair-button svg{

        margin-bottom: -3px;

    }

    @media screen and (max-width: 1330px) {

        .container {

            width: 50%;

        }
        .form {

            width: 100%;

        }
    }

    @media screen and (max-width: 1064px) {

        .container {

            width: 90%;
            height: auto;

        }

    }

    @media (min-width: 1200px) and (max-width: 1499px) {

        .container{

            width: 60em;
            height: 30em;

        }

        .imagens{

            width: 50em;

        }

    }

    @media (min-width: 1050px) and (max-width: 1199px) {

        .container{

            width: 60em;
            height: 30em;

        }

        .imagens{

            width: 50em;

        }

    }
    @media (min-width: 900px) and (max-width: 1049px) {

        .container{

            width: 59em;
            height: 29em;

        }

        .imagens{

            width: 50em;

        }

        .input-box{

            margin-top: 4em;
            margin-left: 1em;

        }

        .continue-button{

            margin-left: 1.5em;
            margin-right: 1em;

        }

    }

    @media (min-width: 750px) and (max-width: 899px) {

        .container{

            display: grid;
            margin-left: -30em;
            width: 20em;
            height: 27em;

        }

        .imagens{

            width: 48.8em;

        }

        .input-box{

            margin-top: 4em;
            margin-left: 1em;

        }

        .continue-button{

            margin-left: 1.5em;
            margin-right: 1em;

        }

    }

    @media (min-width: 600px) and (max-width: 659px) {

        .container{

            display: grid;
            margin-left: -20em;
            width: 20em;
            height: 27em;

        }

        .imagens{

            width: 39.84em;

        }

        .input-box{

            margin-top: 4em;
            margin-left: 1em;

        }

        .continue-button{

            margin-left: 1.5em;
            margin-right: 1em;

        }

        .imagens svg{

            width: 100px;
            height: 100px;

        }

    }

    @media (min-width: 450px) and (max-width: 539px) {

        .container{

            display: grid;
            margin-left: -16em;
            width: 20em;
            height: 27em;

        }

        .imagens{

            width: 32.88em;

        }

        .imagens-div{

            margin-left: 3.5em;

        }

        .texto{

            margin-left: 2em;

        }

        .continue-button{

            margin-left: 3.5em;
            margin-right: 1em;

        }  

        .sair-button{

            margin-left: 2em;

        }

    }

    @media (min-width: 300px) and (max-width: 449px) {

        .container{

            display: grid;
            margin-left: -4em;
            width: 20em;
            height: 40em;

        }

        .imagens-div{

            margin-left: 1em;

        }

        .imagens{

            width: 24em;

        }

        .texto{

            margin-top: 0.1em;
            margin-left: -1em;

        }

        .input-box{

            margin-top: 4em;
            margin-left: 4em;

        }

        .continue-button{

            margin-left: 1em;
            margin-right: 1em;

        } 

        .sair-button{

            margin-left: -1em;
            margin-top: -2em;

        }

    }

</style>