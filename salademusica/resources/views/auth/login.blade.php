<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" width="50px" href="/assets/images/icone-site.png">

        <title>Entrar</title>

    </head>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <body>
        
        <div class="container">

            <div class="form-imagem">

                <img src="../assets/images/ifpr-logo.svg" alt="">

            </div>

            <div class="form">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-header">

                        <div class="title">

                            <h1>Entrar</h1> 

                        </div>

                        <div>

                            <a class="login-button" href="{{route('welcome') }}"> ❮ Voltar</a>

                        </div>

                    </div>

                    <div class="input-group">

                        <div class="input-box">

                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />

                        </div>

                        <div class="input-box mt-4">

                            <x-input-label for="password" :value="__('Senha')" />

                            <div class="input-box mt-4">

                                <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />

                                <img id="icone-olho-fechado" src="\assets\images\olho-fechado.svg" onclick="mostrarSenha()"/>
                                
                                <img id="icone-olho-aberto" src="\assets\images\olho-aberto.svg" style="display: none;" onclick="mostrarSenha()"/>
                            
                            </div>

                        </div>

                        <div class="input-box mt-4">

                            <label for="remember_me" class="inline-flex items-center">
                                
                                <input id="lembre-me" type="checkbox" class="checkbox-lembrar rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                
                                <span class="lembre-me ms-2 text-sm text-gray-600">{{ __('Lembre-me') }}</span>
                            
                            </label>

                        </div>

                        <div class="continuar-botao-div flex items-center justify-end mt-4">

                            <div class="continue-button">

                                <x-primary-button class="ms-3">
                                    {{ __('Continuar') }}
                                </x-primary-button>

                            </div>

                            @if (Route::has('password.request'))

                                <a class="esqueceu-senha underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">

                                    {{ __('Esqueceu a sua senha?') }}

                                </a>

                            @endif

                        </div>

                    </div>
                    
                    
                </form>

                <div class="cadastrar">

                    <span class="frase-cadastrar">{{ __('Ainda não é um usuário?') }}</span>

                    <a href="{{ route('register') }}">

                        <span class="cadastrar-link">{{ __('Crie uma conta.') }}</span>

                    </a>

                </div>

                @if ($errors->any())

                    <div class="erros">

                        <x-input-error :messages="$errors->get('email')" class="erros-mensagem" />

                        <x-input-error :messages="$errors->get('password')" class="erros-mensagem" />

                    </div>

                @endif

            </div>

        </div>

    </body>

<script>

    document.addEventListener('DOMContentLoaded', function() {

        var inputSenha = document.getElementById('password');
        inputSenha.type = 'password';

    });

    function mostrarSenha() {

        var inputSenha = document.getElementById('password');
        var iconeOlhoFechado = document.getElementById('icone-olho-fechado');
        var iconeOlhoAberto = document.getElementById('icone-olho-aberto');

        if (inputSenha.type === 'password') {

            inputSenha.type = 'text';
            iconeOlhoFechado.style.display = 'none';
            iconeOlhoAberto.style.display = 'inline-block';

        } else {
            
            inputSenha.type = 'password';
            iconeOlhoFechado.style.display = 'inline-block';
            iconeOlhoAberto.style.display = 'none';
        }

    }

</script>

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
        width: 80%;
        height: 80vh;
        display: flex;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.212);

    }

    .input-group{

        flex-direction: column

    }

    .form-imagem{

        width: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        background-color: #98bd97;
        padding: 1rem;

    }

    .form-imagem img {

        width: 30rem;

    }

    .form {

        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        background-color: #fff;
        padding: 3rem;

    }

    .form-header {

        margin-bottom: 3rem;
        display: flex;
        justify-content: space-between;

    }

    .login-button {

        display: flex;
        align-items: center;
        margin-top: 0.6em;
        border: none;
        background-color: #7ABA78;
        padding: 0.4rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
        font-weight: 500;
        color: #fff;

    }

    .login-button:hover {

        background-color: #3b9738;

    }

    a:link {

        text-decoration: none;
        color: #7ABA78;

    }

    .form-header h1::after {

        content: '';
        display: block;
        width: 6rem;
        height: 0.3rem;
        background-color: #7ABA78;
        margin: 0 auto;
        position: relative;
        border-radius: 10px;

    }

    .esqueceu-senha{

       color: #7ABA78;
       position: relative;
       top: 1em;
       left: 1em;

    }

    .esqueceu-senha:hover{

        color: #50854e;

    }

    .input-group {

        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 1rem 0;
        gap: 1em;

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

        transition: 0.2s;
        outline: 2px solid #7ABA78;

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

        margin-top: -2em;

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

    }

    .continue-button button:hover {

        background-color: #3b9738;

    }

    .lembre-me{

        position: relative;
        color: #034201;
        bottom: 3.3em;

    }
    
    #lembre-me{

        position: relative;
        bottom: 3em;

    }

    .continue-button button a {

        text-decoration: none;
        font-size: 0.93rem;
        font-weight: 500;
        color: #fff;

    }

    #icone-olho-fechado, #icone-olho-aberto{
      
        position: relative;
        margin-left: 10.5em;
        bottom: 2.5em;
        width: 25px;

    }

    .cadastrar{

        position: relative;
        top:5%;

    }

    .frase-cadastrar{

        color: #50854e;

    }

    .cadastrar-link{

        color: #034201;
        text-decoration: underline;

    }

    .cadastrar-link:hover{

        color: #06c406;

    }
    
    .erros{

        position: relative;
        margin-top: 3em;
        color: red;

    }

    .erros-mensagem{

        font-weight: 500;
        list-style-type: none;

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

    @media (min-width: 1200px) and (max-width: 1499px) {

        .container{

            height: 35em;

        }

        .form{

            border-radius: 10px;

        }

    }
/* -------------------------------------------- 175% --------------------------------------------*/
    @media (min-width: 1050px) and (max-width: 1199px) {

        .container{

            height: 30em;

        }

        .form-header{

            margin-top: 2.2em;

        }

        .input-group{

            margin-top: -2em;

        }

        .continue-button{

            margin-top: -1.4em;

        }
        
        .form{

            border-radius: 10px;

        }

        .continuar-botao-div{

            margin-top: -1em;

        }

    }

    @media (min-width: 900px) and (max-width: 1049px) {

        .container{

            height: 29em;
            width: 34em;

        }

        .continue-button{

            margin-top: -4em;

        }

        .form{

            border-radius: 10px;

        }
        
        .input-group{

            margin-top: -2em;

        }

    }

    @media (min-width: 750px) and (max-width: 899px) {
        
        .container{

            height: 23em;
            width: 30em;
            overflow: scroll;
            box-shadow: none;

        }

        .form-header {

            margin-top: -2em;

        }

        .continue-button{

            margin-top: -2em;

        }

        .form{

            height: max-content;
            border-radius: 10px;

        }

        .input-group{

            margin-top: -2em;

        }

        .cadastrar{

            margin-top: 2em;

        }

    }

    @media (min-width: 600px) and (max-width: 659px) {

        .container{

            height: 19em;
            width: 25.5em;
            overflow: scroll;
            box-shadow: none;

        }

        .form-header {

            margin-top: -2em;
            font-size: 14px;

        }

        .input-group{

            margin-top: -2em;

        }

        .input-box input{

            font-size: 14px;

        }

        .continue-button button{

            margin-top: -1em;
            font-size: 14px;

        }

        .cadastrar, .esqueceu-senha{

            font-size: 14px;

        }

        .esqueceu-senha{

            margin-left: 1.5em;

        }

        .cadastrar{

            margin-top: 2em;

        }

        .form{

            height: max-content;
            border-radius: 10px;

        }

        #icone-olho-fechado, #icone-olho-aberto{

            margin-left: 11.4em;

        }
                
    }

    @media (min-width: 450px) and (max-width: 539px) {

        .container{

            height: 14.8em;
            width: 22em;
            overflow: scroll;
            box-shadow: none;

        }

        .form-header {

            margin-top: -2.5em;
            font-size: 14px;

        }

        .form-header h1{

            font-size: 22px;
            margin-top: 0.4em;
        }

        .input-group{

            margin-top: -2em;

        }

        .input-box input{

            font-size: 14px;

        }

        .continue-button button{

            margin-top: -1em;
            font-size: 12px;
            height: 2.8em;

        }

        .cadastrar, .esqueceu-senha{

            font-size: 12px;

        }

        .cadastrar{

            margin-top: 2em;

        }

        .esqueceu-senha{

            margin-left: 2.5em;

        }

        .login-button{

            margin-right: 1.2em;
            font-size: 12px;

        }

        .lembre-me{

            bottom: 3.6em;

        }

        .form{

            height: max-content;
            border-radius: 10px;

        }
        

    }

    @media (min-width: 300px) and (max-width: 449px) {

        .container{

            height: 35em;
            width: 24em;
            overflow: scroll;
            box-shadow: none;

        }

        .form-header {

            font-size: 14px;
            margin-top: 6em;

        }

        .form-header h1{

            font-size: 22px;

        }

        .input-group{

            margin-top: -2em;

        }

        .input-box input{

            font-size: 14px;

        }

        .continue-button button{

            margin-top: -1em;
            font-size: 12px;
            height: 2.8em;

        }

        .cadastrar, .esqueceu-senha{

            font-size: 12px;

        }

        .cadastrar{

            margin-top: 2em;

        }

        .esqueceu-senha{

            margin-left: 2.5em;

        }

        .login-button{

            margin-right: 1.2em;
            font-size: 12px;

        }
        
        .lembre-me{

            bottom: 3.6em;

        }

        .form{

            height: max-content;
            border-radius: 10px;

        }

    }

</style>

