<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <title> Perfil - Editar Informações</title>

    <div style="margin-bottom: 20em;">

        <div class="main py-12 d-flex align-items-center justify-content-center">

            <div class="row perfil">
                
                <aside class="container-sm w-25">

                    <div class="container container-informacoes-esquerda">

                        <div class="informacoes-basicas">

                            @if($user->imagem === NULL)

                                <svg class="foto-usuario" xmlns="http://www.w3.org/2000/svg" width="200px" height="200px" fill="#dad7da" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                </svg>
                    
                            @elseif($user->imagem != NULL)

                                <img class="foto-usuario" src="{{$user->imagem}}"/>

                            @endif

                            <h2>{{ $user->nome }}</h2>

                            <span>{{ $user->email }}</span>

                        </div>

                        {{-- profile.userStatus
                        profile.index --}}

                        <div class="links">
        
                            <div class="perfil-link">

                                <a href="{{route("profile.index")}}">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                    </svg>

                                    <button>Perfil</button>

                                </a>

                            </div>

                            <div class="editar-perfil-link">
                                    
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>

                                <span>Editar Perfil</span>
                                

                            </div>

                        </div>

                    </div>

                </aside>

                <section class="container-direita justify-content-center col">

                    <div class="informacoes-usuario container bg-white sm:rounded-lg">

                        <div class="container mx-auto container-informacoes-direita space-y-6 justify-content-center col">
                        
                            <div class="informacoes-editar-foto">
                        
                                @include('profile.partials.update-user-photo-form')
                        
                            </div>
                                    
                            <div class="informacoes-editar-informacoes-basicas">
                        
                                @include('profile.partials.update-profile-information-form')
                        
                            </div>
                        
                            <div class="informacoes-editar-senha">
                        
                                @include('profile.partials.update-password-form')
                        
                            </div>

                            <div class="informacoes-editar-perfil">
                        
                                @include('profile.partials.delete-user-form')
                        
                            </div>
                        
                        </div>

                    </div>

                </section>

            </div>

        </div>

    </div>

    @include('footer.footer')

</x-app-layout>

<style>

    *{

        text-decoration: none !important;

    }

    .perfil{

        margin-left: 0.4em;


    }

    .main{


        background-color: #e3f8e6;

    }

    /* ------------------------------------------------------- Container Links ------------------------------------------------------- */

    .container-informacoes-esquerda{

        position: relative;
        display:block;
        border:2px solid #d3e0d5;
        background-color: #f8fff7;
        border-radius: 10px;
        width: 30em;
        height: max-content;
    }

    .informacoes-basicas{

        text-align: center;
        padding: 1.5em;

    }

    .foto-usuario{

        position: relative;
        margin-left:6.5em;
        width: 200px;
        height: 200px;
        margin-bottom: 1em;
        border-radius:50% !important; 
        border:1px solid #dad7da;

    }

    .links{

        background-color: rgb(241, 255, 238);
        border-top: 2px solid #d3e0d5;
        margin-left: -0.74em;
        width: 29.74em;
        height: max-content;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;

    }

    .informações-esquerda{

        position: relative;
        max-width: 30em;
        right: 0.5em;

    }

    .perfil-link{

        font-size: 20px;
        border-bottom: 2px solid #d3e0d5;
        padding: 16px;

    }

    .perfil-link a{

        gap: 10px;
        display:flex;
        color: green;

    }

    .perfil-link a:hover{

        transition: 0.5s;
        color: rgb(18, 70, 18);

    }

    .perfil-link svg{

        margin-top: 0.2em;
        margin-left: 2em;

    }


    .editar-perfil-link{

        font-size: 20px;
        padding: 15px;
        display:flex;
        gap: 10px;
        color:#00800075;
        pointer-events: none;

    }

    .editar-perfil-link svg{

        margin-top: 0.2em;
        margin-left: 2em;

    }


    /* ------------------------------------------------------- Container com informações do Usuário ------------------------------------------------------- */

    .informacoes-usuario{

        position: relative;
        width: 50em;
        max-width: 65em;
        margin-right: 20em;
        background-color: #f8fff7;
        border:2px solid #d3e0d5;
        text-align: start;

    }
    .container-dados{

        position: relative;

    }

    .imagem-olho{

        position: absolute;
        cursor: pointer;
        width: 20px;
        height: 20px;
        margin-left: 43em;
        margin-top: -2em;

    }

    /* ------------------------------------------------------- Editar Foto ------------------------------------------------------- */

    .informacoes-editar-foto{

        text-align: center;
        border-bottom: 2px solid #d3e0d5;

    }

    .informacoes-editar-foto h2{

        margin-top: 1em;
        text-align: start;

    }

    .imagem-input{

        margin-left: 14.5em;

    }

    .excluir-foto{

        position: absolute;
        left: 35em;
        margin-top: -8.3em;
    }

    .botao-salvar{

        margin-top: 1em;
        margin-left: 21em;
        margin-bottom: 2em;

    }

    .arquivos{

        position: absolute;
        font-weight: 500;
        font-size: 11px;
        margin-right: 30em;

    }

    /* ------------------------------------------------------- Editar Informações Básicas ------------------------------------------------------- */

    .informacoes-editar-informacoes-basicas{

        border-bottom: 2px solid #d3e0d5;

    }

    /* ------------------------------------------------------- Editar Senha ------------------------------------------------------- */ 


    .informacoes-editar-senha{

        border-bottom: 2px solid #d3e0d5;

    }

    /* ------------------------------------------------------- Excluir Conta ------------------------------------------------------- */ 

    .excluir-conta-botao{

        margin-left: 27em;
        padding-bottom: 5em;

    }

    /* ------------------------------------------------------- Ajustamento da Tela ------------------------------------------------------- */

    @media (min-width: 7680px) {

        .personalizacao-footer{

            margin-top: 93.4em;

        }

    }

    @media (min-width: 5760px) and (max-width: 7679px) {

        .personalizacao-footer{

            margin-top: 34.6em;

        }

    }
    /* ------------------------------ 125% ------------------------------ */

    @media (min-width: 1400px) and (max-width: 1599px) {

        .row{

            width: 60em;

        }

        .container-informacoes-esquerda{

            margin-left: -8em;
            margin-bottom: 2em;

        }

        .container-direita{

            margin-left: 4.5em;

        }

    }

    /* ------------------------------ 150% ------------------------------ */

    @media (min-width: 1200px) and (max-width: 1499px) {

        .container-informacoes-esquerda{

            position: absolute;
            margin-left: -11em;
            margin-bottom: 2em;

        }
        
        .container-direita{

            margin-top: 35em;
            margin-right: -14.5em;

        }

    }

    /* ------------------------------ 175% ------------------------------ */

    @media (min-width: 1050px) and (max-width: 1199px) {

        .container-informacoes-esquerda{

            position: absolute;
            margin-bottom: 2em;
            margin-left: -10em;

        }

        .container-direita{

            margin-top: 35em;
            margin-right: -14.5em;

        }

    }

    /* ------------------------------ 200% ------------------------------ */

    @media (min-width: 900px) and (max-width: 1049px) {

        .container-direita{

            margin-top: 32em;
            margin-left: -18em;

        }
        .container-informacoes-esquerda{

            position: absolute;
            margin-left: 8em;

        }   

        .excluir-foto{

            margin-left: 1em;

        }

        .arquivos{

            margin-left: 6em;

        }

        .imagem-input{

            margin-left: 14em;

        }

        .botao-salvar{

            margin-left: 19.5em;

        }

        .excluir-conta-botao{

            margin-left: 25.5em;

        }

        .imagem-olho{

            position: absolute;
            margin-left: 40em;

        }
        
    }

    /* ------------------------------ 250% ------------------------------ */
    @media (min-width: 750px) and (max-width: 899px) {

        .foto-usuario{

            width: 150px;
            height: 150px;

        }

        .informacoes-usuario{

            width: 40em;
            font-size: 12px;

        }

        .container-direita{

            margin-top: 24em;
            margin-left: -15em;

        }

        .container-informacoes-esquerda{

            position: absolute;
            margin-left: 1em;
            font-size: 12px;

        }

        .informacoes-basicas h2{

            font-size: 20px;

        }

        .links span{

            font-size: 15px;

        }

        .links button{

            font-size: 15px;

        }

        .links{

            position: relative;
            margin-left: -1.04em;

        }

        .imagem{

            width: 200px;
            margin-left: -4em;
            height: 200px;

        }

        .arquivos{

            margin-left: -4em;

        }

        .botao-salvar{

            margin-left: 15.5em;
            font-size: 12px;

        }

        .excluir-conta-botao{

            margin-left: 17em;
            font-size: 10px;

        }

        .botao-excluir-foto{

            font-size: 12px;
            margin-top: -8.5em;
            margin-left: -6.2em;

        }

        h2{

            font-size: 23px;

        }

        .links svg{

            width: 20px;
            height: 20px;

        }

        svg{

            height: 30px;
            width: 30px;
            margin-top: -0.1em;

        }

        .input-informacoes-basica{

            font-size: 13px;

        }

        .imagem-olho{

            position: absolute;
            margin-left: 31em;
            margin-top:-2.5em;

        }

        .mt-2{

            top: 4em;
            width: 10em;
            right: 30em;
            font-size: 12px;

        }
        
        .verificacao-email p{

            margin-top: 5em !important;
            margin-right: -29em;
            font-size: 10px;

        }
        
        .verificacao-email p button{

            font-size: 10px;

        }

    }

    /* ------------------------------ 300% ------------------------------ */
    @media (min-width: 600px) and (max-width: 659px) {

        .main{

            margin-left: -0.5em;

        }

        .foto-usuario{

            width: 150px;
            height: 150px;

        }

        .informacoes-usuario{

            width: 40em;
            font-size: 12px;
            border-radius: 10px;

        }

        .container-direita{

            margin-top: 24em;
            margin-left: -15em;

        }

        .container-informacoes-esquerda{

            position: absolute;
            margin-left: 1em;
            font-size: 12px;

        }

        .informacoes-basicas h2{

            font-size: 15px;

        }

        .links span{

            font-size: 15px;

        }

        .links button{

            font-size: 15px;

        }

        .links{

            position: relative;
            margin-left: -1.04em;

        }

        .imagem{

            width: 180px;
            margin-left: -3.5em;
            height: 180px;

        }

        .arquivos{

            margin-left: -4em;

        }

        .botao-salvar{

            margin-left: 15.5em;
            font-size: 12px;

        }

        .excluir-conta-botao{

            margin-left: 17em;
            font-size: 10px;

        }

        .botao-excluir-foto{

            font-size: 12px;
            margin-top: -8.5em;
            margin-left: -7em;

        }

        h2{

            font-size: 22px;

        }

        .links svg{

            width: 20px;
            height: 20px;

        }

        svg{

            height: 30px;
            width: 30px;
            margin-top: -0.1em;

        }

        .input-informacoes-basica{

            font-size: 13px;

        }

        .imagem-olho{

            position: absolute;
            margin-left: 31em;
            margin-top:-2.5em;

        }

        .mt-2{

            top: 6em;
            width: 10em;
            right: 30em;
            font-size: 12px;

        }

        .verificacao-email p{

            margin-top: 3em !important;
            margin-right: -29em;
            font-size: 10px;

        }
        
        .verificacao-email p button{

            font-size: 10px;

        }

    }

    /* ------------------------------ 400% ------------------------------ */
    @media (min-width: 450px) and (max-width: 539px) {

        .foto-usuario{

            width: 110px;
            height: 110px;
            margin-left: 8em;

        }

        .informacoes-usuario{

            width: 35em;
            font-size: 12px;
            border-radius: 10px;

        }

        .container-direita{

            margin-top: 21em;
            margin-left: -16.7em;

        }

        .container-informacoes-esquerda{

            margin-left: -4em;
            position: absolute;
            font-size: 12px;

        }

        .informacoes-basicas h2{

            font-size: 15px;

        }

        .links span{

            font-size: 15px;

        }

        .links button{

            font-size: 15px;

        }

        .links{

            position: relative;
            margin-left: -1.04em;

        }

        .imagem{

            width: 160px;
            margin-left: -5em;
            height: 160px;

        }

        .arquivos{

            margin-left: -6em;

        }

        .botao-salvar{

            margin-left: 13em;
            font-size: 12px;

        }

        .excluir-conta-botao{

            margin-left: 14.5em;
            font-size: 10px;

        }

        .botao-excluir-foto{

            font-size: 10px;
            margin-top: -8.5em;
            margin-left: -13.5em;

        }

        h2{

            font-size: 20px;

        }

        .links svg{

            width: 17px;
            height: 17px;

        }

        svg{

            height: 25px;
            width: 25px;
            margin-top: -0.1em;

        }

        .input-informacoes-basica, .input-senha{

            height: 3em;
            font-size: 11px;

        }

        .imagem-olho{

            position: absolute;
            margin-left: 27em;
            margin-top: -2.2em;

        }

        .mt-2{

            top: 6em;
            width: 10em;
            right: 32em;
            font-size: 10px;

        }

        .verificacao-email p{

            margin-top: 6em !important;
            margin-right: -25em;
            font-size: 7px;

        }

        .verificacao-email p button{

            font-size: 7px;

        }

    }

    /* ------------------------------ 500% ------------------------------ */
    @media (min-width: 300px) and (max-width: 449px) {

        .row{

            width: 5em;
            margin-left: -17.9em;

        }

        .foto-usuario{

            width: 90px;
            height: 90px;
            margin-left: 3em;

        }

        .informacoes-usuario{

            width: 30em;
            font-size: 10px;
            border-radius: 10px !important;


        }

        .container-direita{

            margin-top: 19.6em;
            margin-left: -13em;

        }

        .container-informacoes-esquerda{

            position: absolute;
            width: 20em;
            margin-left: -2em;
            font-size: 10px;

        }

        .informacoes-basicas h2{

            font-size: 12px;

        }

        .botao-salvar{

            margin-left: 9.7em;
            font-size: 10px;

        }

        .excluir-conta-botao{

            margin-left: 10em;
            font-size: 8px;

        }

        .botao-excluir-foto{

            font-size: 8px;
            margin-top: -8.5em;
            margin-left: -24em;
            width: 8em;

        }

        .links span{

            font-size: 12px;
            margin-top: 0.3em;

        }

        .links button{

            font-size: 12px;
            margin-top: 0.3em;

        }

        .links svg{

            width: 15px;
            height: 15px;

        }

        .links{

            position: relative;
            width: 19.7em;
            margin-left: -1.27em;

        }

        h2{

            font-size: 18px;

        }

        svg{

            height: 25px;
            width: 25px;
            margin-top: -0.1em;

        }

        .imagem{

            width: 140px;
            margin-left: -6.5em;
            height: 140px;

        }

        .arquivos{

            margin-left: -8.5em;

        }

        .input-informacoes-basica, .input-senha{

            height: 3em;
            font-size: 11px;

        }

        .imagem-olho{

            position: absolute;
            margin-left: 20.5em;
            margin-top: -2.7em;

        }

        .mt-2{

            top: 5em;
            width: 12em;
            right: 28em;
            font-size: 8px;

        }

        .verificacao-email p{

            margin-top: 7.5em !important;
            margin-right: -27em;
            font-size: 6px;

        }

        .verificacao-email p button{

            font-size: 6px;

        }

    }
    
</style>