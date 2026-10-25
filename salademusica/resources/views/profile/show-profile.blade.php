<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <title> Perfil - Informações</title>

    <div class="main py-12 d-flex align-items-center justify-content-center">

        <div class="row perfil">
            
            <aside class="container-xxl w-25">

                <div class="container container-informacoes-esquerda">

                    <div class="informacoes-basicas">
                        @if($user->imagem === NULL)

                            <svg class="foto-usuario" xmlns="http://www.w3.org/2000/svg" width="200px" height="200px" fill="#dad7da" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>
                
                        @elseif($user->imagem != NULL)

                            <img class="foto-usuario" src="{!! $user->imagem !!}"/>

                        @endif

                        <h2>{{ $user->nome }}</h2>

                        <span>{{ $user->email }}</span>

                    </div>

                    <div class="links">
    
                        <div class="perfil-link">

                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                            </svg>

                            <span>Perfil</span>
                            
                        </div>

                        <div class="editar-perfil-link">

                            <a href="{{route("profile.userStatus")}}">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg>

                                <button>Editar Perfil</button>
                            
                            </a>

                        </div>

                    </div>

                </div>

            </aside>

            <section class="container-direita justify-content-center col">

                <div class="informacoes-usuario container-xxl bg-white sm:rounded-lg">

                    <ul class="lista-dados row">  

                        <li class="col">

                            <h2>Informações</h2>

                            <dl class="dados-usuario p-4">

                                <dt>
                                    
                                    Nome

                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                        <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                                        <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
                                    </svg>

                                    :

                                </dt>

                                <dd>{{ $user->nome }}</dd>

                            </dl>
                                    
                            <dl class="dados-usuario p-4">

                                <dt>
                                    
                                    Email
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                                        <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                      </svg>
                                    
                                    :</dt>

                                <dd>{{ $user->email }}</dd>

                            </dl>

                            <dl class="dados-usuario p-4">

                                <dt>
                                    
                                    Turma
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                      </svg>
                                    
                                    :
                                
                                </dt>

                                <dd>{{ $user->turma }} {{$user->anoSerie}}</dd>

                            </dl>

                            <dl class="dados-usuario p-4">

                                <dt>
                                    
                                    Matrícula
                                
                                    <img class="matricula-imagem" src="../assets/images/aluno-icone.svg" />
                                
                                    :

                                </dt>

                                <dd>{{ $user->matricula }}</dd>

                            </dl>

                        </li>

                        <li class="col" style="margin-top: 2.7em;">


                            <dl class="dados-usuario p-4">

                                <dt>
                                    
                                    Número de Telefone
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                      </svg>
                                    
                                    :
                                
                                </dt>

                                <dd>{{ $user->numeroTelefone }}</dd>

                            </dl>

                            <dl class="dados-usuario p-4">

                                <dt>
                                    
                                    Situação no IFPR
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                                        <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                        <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
                                      </svg>

                                    :
                                
                                </dt>

                                @switch($user->role)

                                    @case('Controlador')

                                        <dd>Atual Controlador do Site</dd>

                                    @break

                                    @case('Admin')

                                        <dd>Administrador do Site</dd>

                                    @break

                                    @default

                                    <dd>{{ $user->role }}</dd>

                                @endswitch

                            </dl>

                        </li>

                    </ul>

                </div>

            </section>

        </div>

    </div>

    @include('footer.footer')

</x-app-layout>

<style>

    *{

        text-decoration: none !important;

    }

    .perfil{

        height: max-content;
        width: max-content;
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
        margin-bottom: 1em;
        width: 200px;
        height: 200px;
        border-radius:50% !important; 
        border:1px solid #dad7da;

    }

    .links{

        position: relative;
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
        right: 0.5em;
        height: max-content;

    }

    .perfil-link{

        position: relative;
        font-size: 20px;
        padding: 15px;
        border-bottom: 2px solid #d3e0d5;
        display:flex;
        gap: 10px;
        color:#00800075;
        pointer-events: none;

    }

    .perfil-link svg{

        margin-top: 0.2em;
        margin-left: 2em;

    }

    .editar-perfil-link{

        font-size: 20px;
        padding: 16px;
        
    }

    .editar-perfil-link a{

        gap: 10px;
        display:flex;
        margin-left: 2em;
        color: green;

    }

    .editar-perfil-link a:hover{
    
        transition: 0.5s;
        color: rgb(18, 70, 18);


    }

    .editar-perfil-link svg{

        margin-top: 0.2em;

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
    .lista-dados{

        position: relative;
        margin:10px;

    }


    .lista-dados h2{

        width: 7em;
        height: 1.5em;
        border-bottom-right-radius: 10px;
        margin-top: -0.3em;
        text-align: center;
        margin-left: -2.1em;
        border-right: 2px solid #d3e0d5;
        border-bottom: 2px solid #d3e0d5;

    }

    .matricula-imagem{

        width: 30px;
        margin-top: -0.4em;

    }

    dt{

        display:flex;
        gap:5px;

    }

    dt svg{

        margin-top: 0.1em;

    }

    .personalizacao-footer{

        margin-top: 20em;

    }
    /* ------------------------------------------------------- Ajustamento da Tela ------------------------------------------------------- */

    @media (min-width: 7680px) {

        .personalizacao-footer{

            margin-top: 165.8em;

        }

    }

    @media (min-width: 5760px) and (max-width: 7679px) {

        .personalizacao-footer{

            margin-top: 105.4em;

        }

    }

    @media (min-width: 3600px) and (max-width: 4799px) {

        .personalizacao-footer{

            margin-top: 44.9em;

        }

    }

    /* ------------------------------ 125% ------------------------------ */

    @media (min-width: 1400px) and (max-width: 1599px) {

        .perfil{

            margin-right: 3em;

        }

        .container-informacoes-esquerda{

            margin-left: -6em;
            margin-bottom: 2em;

        }

        .container-direita{

            margin-right: 3em;

        }

    }

    /* ------------------------------ 150% ------------------------------ */

    @media (min-width: 1200px) and (max-width: 1499px) {

        .perfil{

            margin-right: 1em;

        }

        .container-informacoes-esquerda{

            position: absolute;
            margin-left: -10em;
            margin-bottom: 2em;

        }
        .container-direita{

            margin-top: 35em;
            margin-right: -14.5em;

        }

        .lista-dados h2{

            margin-top: -9.7px;

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

        .lista-dados h2{

            margin-top: -10px;
            margin-left: -2.2em;

        }

    }

    /* ------------------------------ 200% ------------------------------ */

    @media (min-width: 900px) and (max-width: 1049px) {

        .container-direita{

            margin-top: 35em;

        }
        .container-informacoes-esquerda{

            position: absolute;
            margin-left: 8em;

        }

        .informacoes-usuario{

            width: 50em;

        }

        .container-direita{

            margin-top: 35em;
            margin-left: -18em;

        }

        .lista-dados h2{

            margin-top: -10px;
            margin-left: -2.25em;

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

            margin-top: 25em;
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

        .lista-dados h2{

            font-size: 25px;
            margin-top: -10px;
            margin-left: -2.64em;

        }

    }

    /* ------------------------------ 300% ------------------------------ */
    @media (min-width: 600px) and (max-width: 659px) {

        .foto-usuario{

            width: 150px;
            height: 150px;

        }

        .informacoes-usuario{

            width: 35em;
            font-size: 12px;
            border-radius: 10px !important;


        }

        .container-direita{

            margin-top: 25em;
            margin-left: -15em;

        }

        .container-informacoes-esquerda{

            position: absolute;
            margin-left: -3em;
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
            margin-left: -1em;
            width: 29.7em;

        }   

        .lista-dados h2{

            font-size: 25px;
            margin-top: -10px;
            margin-left: -2.64em;

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
            font-size: 10px;
            border-radius: 10px !important;


        }

        .container-direita{

            margin-top: 22em;
            margin-left: -12.5em;

        }

        .container-informacoes-esquerda{

            position: absolute;
            margin-left: -3em;
            font-size: 10px;

        }

        .informacoes-basicas h2{

            font-size: 15px;

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
            margin-left: -1.22em;
            width: 29.6em;

        }   

        
        .lista-dados h2{

            font-size: 23px;
            margin-top: -10px;
            margin-left: -2.87em;

        }

    }

    /* ------------------------------ 500% ------------------------------ */
    @media (min-width: 300px) and (max-width: 449px) {

        .foto-usuario{

            width: 90px;
            height: 90px;
            margin-left: 3em;

        }

        .informacoes-usuario{

            width: 31.5em;
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

            font-size: 10px;

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


        .lista-dados h2{

            font-size: 18px;
            margin-top: -10px;
            margin-left: -3.7em;

        }

    }

</style>
