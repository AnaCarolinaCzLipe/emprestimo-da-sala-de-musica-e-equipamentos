<body>
    
    <link rel="icon" width="50px" href="/assets/images/icone-site.png">

    <title>Alteração da Senha</title>

    <div class="container">

        <div class="imagens">

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

        <div class="form">

            <div class="texto">

                <span>Para alterar sua senha, informe seu email, para mandarmos um link para a modificação</span>

            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group">

                    <div class="input-box">

                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>

                    <div class="continue-button">

                        <x-primary-button>

                            {{ __('Mandar email') }}

                        </x-primary-button>

                    </div>

                    <div class="voltar">

                        <a href="{{ route("login")}}"> ❮ Voltar para o Login</a>

                    </div>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                </div>

            </form>

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

    .input-group{

        flex-direction: column;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding: 1rem 0;
        gap: 1em;

    }

    .voltar{

        text-align: center;

    }

    .voltar a{

        color:green;
        text-decoration: none;
        transition: 0.5s;

    }

    .voltar a:hover{

        color: rgb(121, 173, 121);
        transition: 0.5s;

    }

    .input-box {

        display: flex;
        flex-direction: column;

    }

    .input-box input {

        margin: 0.6rem 0;
        padding: 0.8rem 1.2rem;
        border: none;
        border-radius: 10px;
        box-shadow: 1px 1px 6px #0000001c;
        font-size: 0.8rem;

    }

    .input-box input:hover {

        background-color: #eeeeee75;

    }

    .input-box input:focus-visible {

        outline: 1px solid #7ABA78;

    }

    .input-box label,
    .gender-title h6 {

        font-size: 0.75rem;
        font-weight: 600;
        color: #000000c0;

    }

    .input-box input::placeholder {

        color: #000000be;

    }

    @media screen and (max-width: 1330px) {

        .form-imagem {

            display: none;

        }
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

        .input-group {

            flex-direction: column;
            z-index: 5;
            padding-right: 5rem;
            max-height: 10rem;
            overflow-y: scroll;
            flex-wrap: nowrap;

        }

        .gender-inputs {

            margin-top: 2rem;

        }

        .gender-group {

            flex-direction: column;
            
        }

        .gender-title h6 {

            margin: 0;

        }

        .gender-input {

            margin-top: 0.5rem;

        }

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

    .mb-4{

        margin-top: 1em;
        text-align: center;
        color: rgb(3, 78, 3);

    }

    @media (min-width: 1200px) and (max-width: 1499px) {

        .container{

            width: 60em;

        }

        .imagens{

            width: 60em;

        }

    }


    @media (min-width: 1050px) and (max-width: 1199px) {

        .container{

            width: 60em;

        }

        .imagens{

            width: 60em;

        }

    }

    @media (min-width: 900px) and (max-width: 1049px) {

        .container{

            width: 55em;
            height: 25em;

        }

        .imagens{

            width: 60em;

        }

        .input-box{

            margin-top: 4em;
            margin-left: 1em;

        }

        .continue-button{

            margin-left: 1.5em;
            margin-right: 1em;

        }

        .input-group{

            overflow-y: hidden !important;
            margin-left: 2em;

        }

    }

    @media (min-width: 750px) and (max-width: 899px) {

        .imagens{

            width: 65em;

        }

        .container{

            margin-left: -3em;

        }

        .input-box{

            margin-top: 4em;
            margin-left: 1em;

        }

        .continue-button{

            margin-left: 1.5em;
            margin-right: 1em;

        }

        .input-group{

            overflow-y: hidden !important;
            margin-left: 1em;

        }

    }

    @media (min-width: 600px) and (max-width: 659px) {

        .container{

            display: grid;
            width: 28em;
            margin-left: -11.7em;

        }

        .input-group{

            overflow-y: hidden !important;
            margin-left: 5em;

        }

        .imagens{

            width: 39.69em;

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

    @media (min-width: 450px) and (max-width: 539px) {

        .container{

            display: grid;
            width: 28em;
            margin-left: -5em;

        }

        .input-group{

            overflow-y: hidden !important;
            margin-left: 5em;

        }

        .imagens{

            width: 31.39em;

        }

        .input-box{

            margin-top: 4em;
            margin-left: 1em;

        }

        .continue-button{

            margin-left: 1.5em;
            margin-right: 1em;

        }  

        .texto{

            margin-left: 3em;

        }

    }

    @media (min-width: 300px) and (max-width: 449px) {

        .container{

            height: 13em;
            margin-left: -2.99em;
            margin-top: -3em;
            display: grid;
            box-shadow: none;

        }

        .imagens{

            width: 24.12em;

        }

        .form{

            width: 24.12em;
            height: 15em;

        }

        .input-box{

            margin-top: 4em;
            margin-left: 4em;

        }

        .continue-button{

            margin-left: 5em;
            margin-right: 1em;

        } 
        
        .voltar{

            margin-left: 3.5em;

        }

        .input-group{

            overflow-y: hidden !important;
            margin-left: 1em;

        }

    }
    
</style>