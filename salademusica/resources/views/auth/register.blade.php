<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro</title>
        <link rel="icon" width="50px" href="/assets/images/icone-site.png">

    </head>

    <body>

        <div class="container">

            <div class="form-image">

                <img src="../assets/images/ifpr-logo.svg" alt="">

            </div>

            <div class="form">

                @if ($errors->any())

                    <div class="aviso-erros">

                        <button class="erros-botao">

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                            </svg>
                        
                        </button>

                        <div class="panel">

                            <div>
                            
                                <div style="display: flex; gap:10px; margin-bottom:10px;">
                    
                                    <svg style="margin-top:5px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                    </svg>
                    
                                    <h2> Algo deu errado.</h2>
                    
                                </div>
                    
                                <span style="font-weight: bold; margin-bottom:10px;">Tente arrumar as seguintes coisas: </span>
                                            
                                <x-input-error :messages="$errors->get('nome')" class="erros-mensagem" />
                    
                                <x-input-error :messages="$errors->get('email')" class="erros-mensagem" />
                    
                                <x-input-error :messages="$errors->get('matricula')" class="erros-mensagem" />
                    
                                <x-input-error :messages="$errors->get('turma')" class="erros-mensagem"/>
                    
                                <x-input-error :messages="$errors->get('anoSerie')" class="erros-mensagem"/>
                    
                                <x-input-error :messages="$errors->get('numeroTelefone')" class="erros-mensagem" />
                    
                                <x-input-error :messages="$errors->get('password')" class="erros-mensagem"/>
                    
                                <x-input-error :messages="$errors->get('password_confirmation')" class="erros-mensagem"/>
                
                            </div>
                
                        </div>

                    </div>

                @endif

                <div class="form-header">

                    <div class="title">

                        <h1>Cadastre-se</h1>

                    </div>
                    
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group">

                        <div id="nome-div" class="input-box">

                            <x-input-label for="nome" :value="__('Nome')" />
                            
                            <x-text-input maxlength="40" id="nome" placeholder="Informe seu Nome." class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus autocomplete="name" />

                        </div>

                        <div id="email-div" class="input-box">

                            <x-input-label for="email" :value="__('Email')" />
                            
                            <x-text-input maxlength="50" id="email" placeholder="Exemplo@[gmail, hotmail, ...].com" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        
                        </div>

                        <div id="matricula-div" class="input-box">

                            <x-input-label for="matricula" :value="__('Matrícula')" />
                            
                            <x-text-input id="matricula" min="11" placeholder="Informe sua Matricula" class="block mt-1 w-full" type="text" name="matricula" :value="old('matricula')" required autocomplete="username" oninput="formatarMatricula()"/>

                        </div>

                        <div id="turma-div" class="input-box-select">
                            
                            <x-input-label for="turma" :value="__('Turma')" />

                            <select id="turma" name="turma" class="block mt-1 w-full">

                                @foreach($turmas as $turma)

                                    <option value="{{ $turma }}">{{ $turma }}</option>
                                    
                                @endforeach
                                
                            </select>

                        </div>

                        <div id="ano-serie-div" class="input-box-select-ano">
                            
                            <x-input-label for="anoSerie" :value="__('Ano Série')" />

                            <select id="anoSerie" name="anoSerie" class="block mt-1 w-full">

                                @foreach($anoSeries as $anoSerie)

                                    <option value="{{ $anoSerie }}">{{ $anoSerie }}</option>

                                @endforeach

                            </select>

                        </div>

                        <div id="numero-telefone-div" class="input-box">

                            <x-input-label for="numeroTelefone" :value="__('Número de Telefone')" />
                            
                            <x-text-input id="numeroTelefone" placeholder="(__) _____-____" class="block mt-1 w-full" type="text" name="numeroTelefone" :value="old('numeroTelefone')" required minlegth="10" oninput="formatarTelefone()"/>

                        </div>

                        <div id="senha-div" class="input-box">

                            <x-input-label for="password" :value="__('Senha')" />

                            <x-text-input maxlength="100" id="password" class="block mt-1 w-full pr-12" type="password" name="password" required autocomplete="new-password" />

                            <img class="imagem-olho" id="icone-olho-fechado-senha" src="\assets\images\olho-fechado.svg" style="display: none;" onclick="mostrarSenha('password', 'icone-olho-aberto-senha', 'icone-olho-fechado-senha')"/>

                            <img class="imagem-olho" id="icone-olho-aberto-senha" src="\assets\images\olho-aberto.svg" onclick="mostrarSenha('password', 'icone-olho-aberto-senha', 'icone-olho-fechado-senha')"/>

                        </div>                                                                                          

                        <div id="confirmacao-senha-div" class="input-box">

                            <x-input-label for="password_confirmation" :value="__('Confirme a senha')" />
                            
                            <x-text-input maxlength="100" id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                
                            <img class="imagem-olho" id="icone-olho-fechado-confirmacao-senha" src="\assets\images\olho-fechado.svg" style="display: none;" onclick="mostrarSenha('password_confirmation', 'icone-olho-aberto-confirmacao-senha', 'icone-olho-fechado-confirmacao-senha')"/>

                            <img class="imagem-olho" id="icone-olho-aberto-confirmacao-senha" src="\assets\images\olho-aberto.svg" onclick="mostrarSenha('password_confirmation', 'icone-olho-aberto-confirmacao-senha', 'icone-olho-fechado-confirmacao-senha')"/>

                        </div>

                        <div class="continue-button">
            
                            <x-primary-button class="ms-4">

                                {{ __('Criar Conta') }}

                            </x-primary-button>

                            <div class="frase">

                                <span class="frase-cadastro">{{ __('Já tem uma conta?') }}</span>

                                <a href="{{ route('login') }}">

                                    <span class="cadastrar">{{ __('Faça o login.') }}</span>

                                </a>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    <body>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');

    * {

        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Inter', sans-serif;

    }

    body {

        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #C5EBAA;

    }

    .container {

        border-radius: 10px;
        width: 85%;
        height: 85vh;
        display: flex;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);

    }

    .form-image {

        width: 50%;
        display: grid;
        justify-content: center;
        align-items: center;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        background-color: #98bd97;
        padding: 1rem;

    }

    .form-image img {

        width: 30rem;

    }

    .form{

        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        padding: 3rem;

    }

    .form-header {

        margin-bottom: 3rem;
        display: flex;
        justify-content: space-between;

    }

    a:link {

        text-decoration: none;
        color: #7ABA78;

    }

    .form-header h1::after {

        content: '';
        display: block;
        width: 10rem;
        height: 0.3rem;
        background-color: #7ABA78;
        margin: 0 auto;
        position: relative;
        border-radius: 10px;

    }

    .input-group {

        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 1rem 0;

    }

    .input-box {

        display: flex;
        flex-direction: column;
        margin-bottom: 1.1rem;

    }

    .input-box input {

        margin: 0.6rem 0;
        padding: 0.8rem 1.5rem;
        border: none;
        border-radius: 10px;
        box-shadow: 1px 1px 6px #0000001c;
        font-size: 0.8rem;

    }

    .input-box input:hover {

        background-color: #eeeeee75;

    }

    .input-box input:focus-visible {

        outline:2px solid #7ABA78;

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

    select{

        box-shadow: 1px 1px 6px #0000001c;
        height: 3.2em;
        appearance: none;
        background-color: #bfeebd;
        border-radius: 10px;
        padding: 10px;
        border: #bfeebd;
        cursor: pointer;
        color: black;
        
    }

    select::-ms-expand {

        display: none;

    }

    .input-box-select, .input-box-select-ano{

        position: relative;
        margin-top: 0.7em;
        font-size: 0.75rem;
        font-weight: 600;
        color: #000000c0;
        display: flex;
        flex-direction: column;

    }

    .input-box-select{

        width: 18em;

    }

    .input-box-select-ano{

        width: 9em;
        margin-left: -4.9em;
        margin-right: 3em;

    }

    .input-box-select-ano::after{

        content: '\25BC';
        position: absolute;
        top:1.4em;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        right: 2px;
        padding: 1em;
        border-left: 1px solid rgba(0, 170, 26, 0.295);
        background-color: #bfeebd;
        transition: .25s all ease;
        pointer-events: none;

    }

    .input-box-select::after{

        content: '\25BC';
        position: absolute;
        top:1.4em;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        right: 2px;
        padding: 1em;
        border-left: 1px solid rgba(0, 170, 26, 0.295);
        background-color: #bfeebd;
        transition: .25s all ease;
        pointer-events: none;

    }

    .gender-group {

        display: flex;
        justify-content: space-between;
        margin-top: 0.62rem;
        padding: 0 .5rem;

    }

    .gender-input {

        display: flex;
        align-items: center;

    }

    .gender-input input {

        margin-right: 0.35rem;

    }

    .gender-input label {

        font-size: 0.81rem;
        font-weight: 600;
        color: #000000c0;

    }

    .continue-button{

        margin-left: 12em;

    }

    .continue-button button {

        margin-top: 1.5em;
        width: 100%;
        border: none;
        color: white;
        font-size: 16px;
        background-color: #7ABA78;
        padding: 0.62rem;
        border-radius: 5px;
        cursor: pointer;

    }

    .continue-button button:hover {

        background-color: #3b9738;

    }

    .cadastrar{

        position: relative;
        color: #034201;
        text-decoration: underline;
        top: 2em;
    }

    .cadastrar:hover{

        color: #06c406;

    }

    .frase-cadastro{

        position: relative;
        color: #50854e;
        top: 2em;
        left: 2.6em;

    }

    .frase{

        margin-left: -1em;

    }

    .imagem-olho{
      
        position: absolute;
        width: 23px;
        height: 23px;
        margin-left: 11em;
        margin-top: 2.2em;

    }

    #confirmacao-senha-div{

        margin-right: 15.5em;

    }

    .erros{

        position: absolute;
        background-color: rgb(255, 134, 134);
        border: 1px solid  red;
        border-radius: 10px;
        padding: 3em;
        width: 35em;
        height: max-content;
        justify-content: space-evenly;
        display: grid;
        margin-top: 24em;
        margin-left: 7em;

    }

    .erros-mensagem{

        font-weight: 500;

    }

    .frase-cadastro{

        margin-right: 3em;

    }

    .erros-botao{

        cursor: pointer;
        padding: 6px;
        background-color: red;
        border-radius: 10px;
        border: 2px solid rgb(146, 4, 4);

    }

    .panel {

        position: absolute;
        width: 20em;
        padding: 30px;
        display: none;
        background-color: rgba(248, 0, 0, 0.658);
        overflow: hidden;
        border-radius: 10px;
        margin-left: -18em;
        border: 2px solid rgba(165, 42, 42, 0.692);
        z-index: 1;

    }

    .aviso-erros{

        position: relative;
        margin-bottom: -2.5em;
        margin-left: -20em;

    }

    .erros-mensagem{

        padding: 5px;

    }
    
    @media screen and (max-width: 1330px) {

        .form-image {

            display: none;

        }
        .container {

            width: 100%;

        }
        .form {

            width: 100%;

        }

    }

    @media screen and (max-width: 1064px) {

        .container {

            width: 90%;
            height: 90em;

        }

        .input-group {

            flex-direction: column;
            z-index: 1;
            padding-right: 1rem;
            height: 20em;
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

    /* --------------------------------------- AJUSTAMENTO TELA ---------------------------------------*/

    /* ------------------------------ 110% ------------------------------ */
    @media (min-width: 1600px) and (max-width: 1799px) {

        #turma-div{

            margin-left: 10em;
            margin-right: -0.1em;

        }

        #numero-telefone-div{

            margin-top: 5em;
            margin-left: -22em;

        }

        #ano-serie-div{

            height: 6em;
            margin-left: 0.1em;

        }

        .continue-button{

            margin-top: -8em;
            margin-left: 20em;

        }

        .continue-button span{

            margin-left: -0.1em;

        }

        .erros{

            margin-left: 5em;

        }

    }

    /* ------------------------------ 125% ------------------------------ */
    @media (min-width: 1400px) and (max-width: 1599px) {

        #turma-div{

            margin-right: -0.1em;

        }

        #numero-telefone-div{

            margin-top: 5em;
            margin-left: -16em;

        }

        #ano-serie-div{

            margin-left: 0.1em;
            height: 6em;

        }

        .continue-button{

            margin-top: -8em;
            margin-left: 18em;

        }

        .continue-button span{

            margin-left: -1em;

        }

        .continue-button a{

            margin-left: 1em;

        }

        .erros{

            margin-left: 2em;

        }

    }

    /* ------------------------------ 150% ------------------------------ */
    @media (min-width: 1200px) and (max-width: 1499px) {

        #turma-div{

            margin-left: -0.2em;
            margin-right: 2.5em;

        }

        #numero-telefone-div{

            margin-left: 2em;

        }

        .continue-button{

            margin-top: -1em;
            margin-left: 12em;

        }
        
        .container{

            width: 50em;

        }

        .form{

            border-radius: 10px;
            box-shadow: 5px 5px 10px 10px rgba(0, 0, 0, 0.212);

        }

    }    

    /* ------------------------------ 175% ------------------------------ */
    @media (min-width: 1050px) and (max-width: 1199px) {

        .form{

            border-radius: 10px;
            box-shadow: 5px 5px 10px 10px rgba(0, 0, 0, 0.212);

        }

        .container{

            width: 50em;

        }

        #turma-div{

            margin-right: 2.2em;

        }

        #numero-telefone-div{

            margin-left: 2em;

        }

        .input-group{

            margin-top: -1.5em;

        }

        .input-box input{

            height: 3em;
            font-size: 12px;

        }

        .continue-button{

            margin-left: 12em;
            margin-top: -2em;

        }

        .imagem-olho{

            margin-top: 2em;

        }

    }
    
    /* ------------------------------ 200% ------------------------------ */
    @media (min-width: 900px) and (max-width: 1049px) {

        .container{

            height: 29em;
            width: 40em;
            box-shadow: none;

        }

        .form{

            overflow: scroll;
            border-radius: 10px;

        }

        #turma-div{

            margin-left: 1em;

        }

        #ano-serie-div{

            margin-left: 1em;
            margin-top: 2em;
            margin-bottom: 2em;

        }

        .imagem-olho{

            position: relative;
            margin-top: -2.5em;
            margin-left: 20em;
            margin-right: 1em;

        }

        .input-group{

            margin-top: -2em;

        }
        
        .input-box{

            margin-left: 1em;

        }

        #confirmacao-senha-div{

            width: 97%;
            margin-right: -2em;

        }

        .continue-button{

            margin-left: 1em;

        }
        
        .continue-button span{

            margin-left: 0.5em;

        }

    }
    
    /* ------------------------------ 250% ------------------------------ */
    @media (min-width: 750px) and (max-width: 899px) {

        .container{

            height: 23em;
            width: 38em;
            box-shadow: none;

        }

        .form{

            overflow: scroll;
            border-radius: 10px;

        }

        .form-header{

            position: relative;
            top: 2em;
            font-size: 14px;

        }
        
        .form-header h1{

            margin-right: 1.5em;

        }

        #turma-div{

            margin-left: 1em;

        }
        #ano-serie-div{

            margin-left: 1em;
            margin-top: 4em;
            margin-bottom: 4em;

        }

        .imagem-olho{

            position: relative;
            margin-top: -2.5em;
            margin-left: 20em;
            margin-right: 1em;

        }

        .input-group{

            margin-top: -1em;

        }

        .input-box{

            margin-left: 1em;
        

        }

        .input-box input, .input-box-select, .input-box-select-ano{

            font-size: 12px;
            height: 3em;

        }

        .input-box-select::after, .input-box-select-ano::after{

            padding: 0.7em;

        }

        #confirmacao-senha-div{

            width: 96%;
            margin-right: -2em;

        }

        .continue-button{

            margin-left: 1em;
            height: 3em;

        }

        .panel{

            margin-left: 0.1em;

        }

        .erros-botao{

            margin-top: 6em;

        }

        .aviso-erros{

            margin-bottom: -4.1em;
            margin-right: 1em;

        }

        .frase-cadastro{

            margin-left: 1.3em;

        }

    }

    /* ------------------------------ 300% ------------------------------ */
    @media (min-width: 600px) and (max-width: 659px) {

        .container{

            height: 19.5em;
            width: 36em;
            box-shadow: none;

        }

        .form{

            overflow: scroll;
            border-radius: 10px;

        }

        .form-header{

            position: relative;
            top: 4em;
            font-size: 14px;

        }

        .form-header h1{

            margin-right: 1.5em;

        }

        #turma-div{

            margin-left: 1em;

        }
        #ano-serie-div{

            margin-left: 1em;
            margin-top: 2em;
            margin-bottom: 2em;

        }

        .imagem-olho{

            position: relative;
            margin-top: -2.5em;
            margin-left: 20em;
            margin-right: 1em;

        }

        .input-box{

            margin-left: 1em;


        }

        .input-box input, .input-box-select, .input-box-select-ano{

            font-size: 12px;
            height: 3em;

        }

        .input-box-select{

            margin-bottom: 2em;

        }

        #numero-telefone-div{

            margin-top: 2em;

        }

        .input-box-select::after, .input-box-select-ano::after{

            padding: 0.7em;

        }

        #confirmacao-senha-div{

            width: 96%;
            margin-right: -2em;

        }

        .continue-button{

            margin-bottom: -3em;
            margin-left: 1.5em;

        }

        .frase-cadastro{

            margin-left: 1.2em;

        }

        .panel{

            margin-left: 0.1em;

        }

        .erros-botao{

            margin-top: 6em;

        }

        .aviso-erros{

            margin-bottom: -5.4em;
            margin-right: 1em;

        }

    }

    @media (min-width: 450px) and (max-width: 539px) {

        .container{

            height: 14.5em;
            width: 25em;
            box-shadow: none;

        }

        .form{

            overflow: scroll;
            border-radius: 10px;

        }

        .form-header{

            position: relative;
            top: 12em;
            margin-bottom: 14em;
            font-size: 14px;

        }

        .form-header h1{

            margin-right: 1.5em;

        }

        #turma-div{

            margin-left: 1em;

        }
        #ano-serie-div{

            margin-left: 1em;
            margin-top: 2em;
            margin-bottom: 2em;

        }

        .imagem-olho{

            position: relative;
            margin-top: -2.1em;
            width: 17px;
            height: 17px;
            margin-left: 16em;
            margin-right: 1em;

        }

        .input-group{

            margin-top: -1em;

        }

        .input-box{

            margin-left: 1em;

        }

        .input-box input, .input-box-select select, .input-box-select-ano select{

            font-size: 10px;
            height: 3em;

        }

        .input-box label, .input-box-select label, .input-box-select-ano label{

            font-size: 10px;

        }

        .input-box-select{

            margin-bottom: 2em;

        }

        #numero-telefone-div{

            margin-top: 2em;

        }

        .input-box-select::after, .input-box-select-ano::after{

            padding: 0.3em;

        }

        #confirmacao-senha-div{

            width: 95%;
            margin-right: -2em;

        }

        .continue-button{

            margin-left: 1.2em;

        }
        
        .frase-cadastro{

            margin-left: -0.8em;

        }

        .panel{

            margin-left: 0.1em;

        }

        .erros-botao{

            margin-top: 8em;

        }

        .aviso-erros{

            margin-bottom: -12.9em;
            margin-right: 1em;

        }


    }

    /* ------------------------------ 500% ------------------------------ */
    @media (min-width: 300px) and (max-width: 449px) {

        .container{

            margin-top: -3em;
            height: 48em;
            width: 22em;
            box-shadow: none;

        }

        .form{

            overflow: scroll;
            border-radius: 10px;

        }

        .form-header{

            margin-top: -28em;
            font-size: 12px;

        }

        .form-header h1{

            margin-right: 1.5em;
            margin-top: 0.09em;
        }

        #turma-div{

            margin-left: 1em;

        }

        #ano-serie-div{

            margin-left: 1em;
            margin-top: 2em;
            margin-bottom: 2em;

        }

        .imagem-olho{

            position: relative;
            margin-top: -2.1em;
            width: 17px;
            height: 17px;
            margin-left: 11.5em;

        }

        .input-group{

            margin-top: -2em;

        }

        .input-box{

            margin-left: 1em;

        }

        .input-box input, .input-box-select select, .input-box-select-ano select{

            font-size: 10px;
            height: 3em;

        }

        .input-box label, .input-box-select label, .input-box-select-ano label{

            font-size: 9px;

        }

        .input-box-select{

            margin-bottom: 2em;

        }

        #numero-telefone-div{

            margin-top: 2em;

        }

        .input-box-select::after, .input-box-select-ano::after{

            padding: 0.3em;

        }

        #confirmacao-senha-div{

            width: 95%;
            margin-right: -2em;

        }

        .continue-button{

            margin-left: 1.5em;
            height: 3em;
            margin-top: -1em;

        }

        .frase-cadastro{

            margin-left: -5em;

        }

        .panel{

            margin-left: 0.1em;

        }

        .erros-botao{

            margin-top: 10em;

        }

        .aviso-erros{

            margin-bottom: -16.6em;
            margin-right: -1.5em;

        }

        .frase-cadastro{

            margin-left: -1em;

        }

    }

    @media (min-width: 2000px) and (max-width: 2199px) {

        #ano-serie-div{

            margin-left: 0.1em;
            margin-right: 9em;

        }

    }

    @media (min-width: 2400px) {

        #ano-serie-div{

            margin-left: 0.1em;

        }

    }

</style>

<script>

    function formatarTelefone() 
    {

        let numeroFormatar = numeroTelefone.value;

        if(numeroFormatar.length == 2){

            numeroTelefone.value += ") ";

            numeroTelefone.value = "(" + numeroTelefone.value;

        }

        if(numeroFormatar.length == 10){    
            
            numeroTelefone.value += "-"

        }

        else if (numeroFormatar.length > 11) {
                        
            numeroTelefone.value = numeroFormatar.slice(0,15);

        }
        
    }

    function formatarMatricula()
    {

        let matriculaFormatar = matricula.value;

        if (matriculaFormatar.length > 11) {
                        
            matricula.value = matriculaFormatar.slice(0,11);
            
        }

    }

    function mostrarSenha(inputId, iconeFechadoId, iconeAbertoId) 
    {

        var inputSenha = document.getElementById(inputId);
        var iconeOlhoFechado = document.getElementById(iconeFechadoId);
        var iconeOlhoAberto = document.getElementById(iconeAbertoId);

        if (inputSenha.type === 'password') 
        {

            inputSenha.type = 'text';
            iconeOlhoFechado.style.display = 'none';
            iconeOlhoAberto.style.display = 'inline-block';

        }

        else 
        {
            
            inputSenha.type = 'password';
            iconeOlhoFechado.style.display = 'inline-block';
            iconeOlhoAberto.style.display = 'none'

        }

    }

    var acc = document.getElementsByClassName("erros-botao");
    var i;

    for (i = 0; i < acc.length; i++) 
    {

        acc[i].addEventListener("click", function() 
        {

            this.classList.toggle("active");
            var panel = this.nextElementSibling;

            if (panel.style.display === "block") 
            {

                panel.style.display = "none";

            } 
            else 
            {

                panel.style.display = "block";

            }

        });

    }

</script>