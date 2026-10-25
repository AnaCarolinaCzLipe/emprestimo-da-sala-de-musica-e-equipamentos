 <body>

    <title>Alterar a Senha</title>

    <link rel="icon" width="50px" href="/assets/images/icone-site.png">

    <div class="container">
    
        <div class="imagens">
    
            <div class="imagens-div">
    
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
                </svg>
    
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-forward-fill" viewBox="0 0 16 16">
                        <path d="m9.77 12.11 4.012-2.953a.647.647 0 0 0 0-1.114L9.771 5.09a.644.644 0 0 0-.971.557V6.65H2v3.9h6.8v1.003c0 .505.545.808.97.557"/>
                </svg>

                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                </svg>
    
            </div>
    
        </div>
    
        <div class="form">
    
            <div class="texto">

                <h2 style="margin-bottom: 0.5em;"> Nova Senha</h2>

                <span> Preencha os campos abaixo para trocar a senha. </span>

            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
            
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="input-group">
                
                    <div class="input-box" id="input-box-email">

                        <x-input-label for="email" :value="__('Email')" />

                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                        
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                
                    <div class="input-box">

                        <x-input-label for="password" :value="__('Senha')" />

                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        <img class="imagem-olho" id="icone-olho-fechado-senha" src="\assets\images\olho-fechado.svg" style="display: none;" onclick="mostrarSenha('password', 'icone-olho-aberto-senha', 'icone-olho-fechado-senha')"/>

                        <img class="imagem-olho" id="icone-olho-aberto-senha" src="\assets\images\olho-aberto.svg" onclick="mostrarSenha('password', 'icone-olho-aberto-senha', 'icone-olho-fechado-senha')"/>

                    </div>
                
                    <div class="input-box">

                        <x-input-label for="password_confirmation" :value="__('Confirmar a Senha')" />
                
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                        <img class="imagem-olho" id="icone-olho-fechado-confirmacao-senha" src="\assets\images\olho-fechado.svg" style="display: none;" onclick="mostrarSenha('password_confirmation', 'icone-olho-aberto-confirmacao-senha', 'icone-olho-fechado-confirmacao-senha')"/>

                        <img class="imagem-olho" id="icone-olho-aberto-confirmacao-senha" src="\assets\images\olho-aberto.svg" onclick="mostrarSenha('password_confirmation', 'icone-olho-aberto-confirmacao-senha', 'icone-olho-fechado-confirmacao-senha')"/>

                    </div>

                 </div>
                
                <div class="continue-button">

                    <x-primary-button>

                        {{ __('Resetar a Senha') }}

                    </x-primary-button>

                </div>

            </form>
            
        </div>

    </div>
    
</body>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap');
    
    * {
    
         padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: "Lexend Deca", sans-serif;
            
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
        box-shadow: 5px 5px 10px 10px rgba(0, 0, 0, 0.212);
        border-radius: 10px;

    }
    
    .form{
    
        width: 50%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        padding: 3rem;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;

    
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
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
    
    }

    .imagem-olho{
      
        position: absolute;
        width: 23px;
        height: 23px;
        margin-left: 21em;
        margin-top: 2.2em;

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
    
        position: relative;
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
        width: 30em;
    
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
    
     media (min-width: 1050px) and (max-width: 1199px) {
    
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
    
            width: 70em;
    
        }
    
        .continue-button{
    
            margin-left: 1.5em;
            margin-right: 1em;
    
        }

        .input-group{

            margin-top: 2em;
            margin-bottom: 1em;

        }

        .input-box{

            margin-left: 1em;

        }
    
        #input-box-email{

            margin-top: 8em;

        }

    }
    
    @media (min-width: 750px) and (max-width: 899px) {
    
        .imagens{
    
            width: 65em;
    
        }
    
        .container{
    
            margin-left: -3.5em;
            height: 23em;
    
        }
    
        .input-group{

            margin-top: 2em;
            margin-bottom: 1em;

        }

        .input-box{

            margin-left: 1em;

        }

        #input-box-email{

            margin-top: 8em;

        }
    
        .continue-button{
    
            margin-left: 1.5em;
            margin-right: 1em;
    
        }
    
    }
    
    @media (min-width: 600px) and (max-width: 659px) {
    
        .container{
    
            display: grid;
            width: 28em;
            margin-left: -11.7em;
    
        }

        .form, .imagens{

            border-radius: 0;

        }
    
        .input-group{

            margin-top: 2em;
            margin-bottom: 3em;

        }

        .input-box{

            margin-left: 1em;

        }

        #input-box-email{

            margin-top: 14em;

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
            margin-left: -5em;
    
        }
    
        .form, .imagens{

            border-radius: 0;

        }
    
        .input-group{

            margin-top: 2em;
            margin-bottom: 3em;

        }

        .input-box{

            margin-left: 1em;
            width: 16em;

        }

        #input-box-email{

            margin-top: 7em;

        }
    
        .imagens, .form{
    
            width: 30.77em;
    
        }
    
        .continue-button{
    
            width: 24.5em;
            margin-left: 1em;
    
        }  
    
        .texto{
    
            margin-left: -3.5em;
    
        }
    
    }
    
    @media (min-width: 300px) and (max-width: 449px) {
    
        .container{
    
            display: grid;
            margin-left: -2.5em;
    
        }
    
        .form, .imagens{

            border-radius: 0;

        }
    
        .input-group{

            margin-top: 2em;
            margin-bottom: 3em;

        }

        .input-box{

            margin-left: 1em;
            width: 15em;

        }

        .input-box input{

            width: 20em;

        }

        #input-box-email{

            margin-top: 10em;

        }
    
        .imagens, .form{
    
            width: 30.77em;
    
        }
    
        .continue-button{
    
            width: 15em;
            margin-left: 1em;
    
        }  
    
        .texto{
    
            margin-left: -6.5em;
            width: 17em;
    
        }

        .imagem-olho{

            margin-left: 13.5em;

        }

    }
        
</style>

<script>

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

</script>