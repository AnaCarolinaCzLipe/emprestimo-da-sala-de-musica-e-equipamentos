<nav x-data="{ open: false }">
    <!-- Primary Navigation Menu max-w-7xl-->
    <div class="mx-auto px-4 sm:px-6 lg:px-8">

        <div class="personalizacao-navbar flex justify-between h-16 hidden" id="carregarNav">

            <div class="flex">
                <!-- Logo -->
                <div class="logo-ifpr shrink-0 flex items-center">

                    <a href="https://ifpr.edu.br/curitiba/">

                        <img src="/assets/images/ifpr-logo.svg" width="120px">

                    </a>

                </div>

                <!-- Navigation Links -->
                <div class="personalizacao-links-navbar sm:-my-px sm:ms-10 sm:flex" style="gap:4em;">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="link-personalizacao">

                        <div class="links-navbar-esquerda">

                            <svg style="margin-top: -2px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                              </svg>

                            <span>Início</span>

                        </div>

                    </x-nav-link>

                    <x-nav-link :href="route('layouts.reservas')" :active="request()->routeIs('layouts.reservas')" class="link-personalizacao">

                        <div class="links-navbar-esquerda">

                            <svg style="margin-top: -2px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard-check-fill" viewBox="0 0 16 16">
                                <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                            </svg>

                            <span>Reservas</span>

                        </div>

                    </x-nav-link>

                    <x-nav-link :href="route('gruposmusicais.inicio-grupos')" :active="request()->routeIs('gruposmusicais.inicio-grupos')" class="link-personalizacao">

                        <div class="links-navbar-esquerda">

                            <div style="margin-right:60px; display:flex; gap:10px; margin-top:0.5em;" class="image-container">

                                <img class="image" style="width:25px; height:25px; margin-top:-4px;"src='/assets/images/banda.png' />

                                <span style="position: relative; margin-right:50px;">Grupos</span>

                            </div>

                        </div>

                    </x-nav-link>

                    <x-nav-link :href="route('ajuda.ajuda')" :active="request()->routeIs('ajuda.ajuda')" class="link-personalizacao">

                        <div class="links-navbar-esquerda">

                            <svg style="margin-top: -2px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927"/>
                              </svg>

                            <span>Ajuda</span>

                        </div>

                    </x-nav-link>

                    @if(Auth::user()->role === 'Admin' || Auth::user()->role === 'Controlador')

                        <x-nav-link :href="route('admin.inicio-nav')" :active="request()->routeIs('admin.inicio-nav')" class="link-personalizacao">

                            <div class="links-navbar-esquerda">

                                <svg style="margin-top: -2px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
                                    <path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11z"/>
                                </svg>
                                  
                                <span class="gerenciamento">Gerenciamento</span>

                            </div>

                        </x-nav-link>
                    @endif

                </div>

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                
                <x-dropdown align="right" width="48">
                    
                    <x-slot name="trigger">
                        
                        <button class="botao-navbar-personalização inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150" id="carregarFoto">
                            
                            @if(Auth::user()->imagem === NULL)

                                <div class="imagem-user">

                                    {!! Avatar::create(Auth::user()->nome)->toSvg() !!}

                                </div>
                                
                            @elseif(Auth::user()->imagem != NULL)

                                <div style="" class="imagem-user">

                                    <img src="{{Auth::user()->imagem}}" style="height:40px; width:40px; border-radius:50% !important; border:1px solid rgb(151, 151, 151);"/>

                                </div>

                            @endif
                                
                            <div class="nome-user"> 

                                    {{ Auth::user()->nome }}
                                
                                </div>

                            <div class="ms-1">
                                
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            
                            </div>
                        
                        </button>
                    
                    </x-slot>

                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('profile.index')">
                            {{ __('Perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Sair') }}
                            </x-dropdown-link>
                        
                        </form>
                    
                    </x-slot>
                
                </x-dropdown>
            
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden dropdown-perfil">

                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    
                    </svg>
                
                </button>
            
            </div>
        
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Início') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">

                @if(Auth::user()->imagem === NULL)

                <div class="imagem-user">

                    {!! Avatar::create(Auth::user()->nome)->toSvg() !!}

                </div>
                
            @elseif(Auth::user()->imagem != NULL)

                <div class="imagem-user">

                    <img src="{{Auth::user()->imagem}}" style="height:40px !important; widht:40px !important; border-radius:50% !important; border:1px solid black;"/>

                </div>

            @endif

                <div class="font-medium text-base text-gray-800">{{ Auth::user()->nome }}</div>

                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>

            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.index')" :active="request()->routeIs('profile.index')">
                    {{ __('Perfil') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>

<style>

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap');


    *{

        font-family: "Lexend Deca", sans-serif;

    }
    nav{

        background-color: hsl(240, 9%, 15%);

    }

    .links-navbar-esquerda{

        display: flex;
        gap:10px;
        color: rgb(255, 255, 255);

    }

    .links-navbar-esquerda:hover{

        color: rgb(197, 255, 192);

    }

    .imagem-user + .nome-user{

        margin-left: 10px;

    }


    .image-container {

        width: 25px;
        height: 25px;
        position: relative;

    }

    .image-container:hover .image {

        opacity: 0;

    }

    .image-container::before {

        content: "";
        background-image: url('/assets/images/banda-verde.png'); 
        background-size: cover;
        margin-top: -4px;
        background-position: center;
        position: absolute;
        top: 0;
        left: 0;
        width: 25px;
        height: 25px;
        opacity: 0;

    }

    .image-container:hover::before {

        opacity: 1;

    }

    .links-footer{

        display: flex;
        justify-content: center;
        gap: 20em;
        margin-top: 1em;
        margin-bottom: 2em;
        height: max-content;
        
    }

    .paginas{

        display: grid;
        text-align: start;
        gap: 1px;
        color:white; 
        margin-top: 3em;

    }

    .paginas a{

        color:white;

    }

    .paginas a:hover{

        transition: 0.5s;
        text-decoration: 2px underline #016411 !important;

    }

    .contatos {

        display: grid;
        text-align: start;
        margin-top: 3em;
        padding-right: 10px;

    }

    .contatos a{

        color: white;

    }

    .contatos a:hover{

        transition: 0.5s;
        text-decoration: 2px underline #016411 !important;

    }

    .informacoes{

        display: grid;

    }

    .foto-ifpr-footer{

        width: 15em;

    }

    .informacoes p, .informacoes h6{

        text-align: start;
        width: 20em;
        font-size: 13px;

    }

    .creditos{

        border-top: 2px solid rgba(112, 109, 109, 0.26);
        padding: 10px;
        font-size: 12px;
        color: rgba(128, 128, 128, 0.692);

    }

    .contatos div{

        height: 1em !important;

    }

    .extensoes{

        width: 3em;

    }

    .footer{

        padding-top: 10px;
        color: white;
        height: max-content;
        text-align: center;
        background-color: #23232a;

    }

    /* -------------------------------------------------------- Scrollbar -------------------------------------------------------- */

    ::-webkit-scrollbar {

        width: 10px;

    }

    ::-webkit-scrollbar-track {

        border-radius: 10px;

    }

    ::-webkit-scrollbar-thumb {

        background: rgb(165, 164, 164); 
        border-radius: 10px;

    }

    ::-webkit-scrollbar-thumb:hover {

        background: #4949498f;
    
    }

    /* -------------------------------------------------------- Ajustamento da Tela -------------------------------------------------------- */

    @media (min-width: 1200px) and (max-width: 1499px) {

        .links-footer{

            gap: 10em;

        }

    }

    /* ------------------------------ 175% ------------------------------ */

    @media (min-width: 1200px) and (max-width: 1499px) {

        .personalizacao-links-navbar{

            overflow-x: scroll;

        }

    }

    @media (min-width: 300px) and (max-width: 1199px) { 

        .personalizacao-links-navbar{

            overflow-x: scroll;
            margin-left: -0.5em;

        }

        .links-footer{

            gap: 7em;

        }

        .logo-ifpr{

            margin-left: -2em;

        }

    }

    /* ------------------------------ 200% ------------------------------ */

    @media (min-width: 900px) and (max-width: 1049px) {

        .botao-navbar-personalização{

            margin-right: -1em;
            width: 7em;

        }

        .botao-navbar-personalização .nome-user{

            display: none;

        }

        .links-footer{

            gap: 4.7em;

        }

    }

    /* ------------------------------ 250% ------------------------------ */
    @media (min-width: 750px) and (max-width: 899px) {

        .personalizacao-links-navbar{

            width: 32em;
            
        }

        .botao-navbar-personalização{

            margin-left: -5em;

        }

        .botao-navbar-personalização .nome-user{

            display: none;

        }

        .links-footer{

            display: grid;
            gap: 10px;
            justify-content: start;
            margin-left: 5em;

        }

        .paginas{

            gap: 24px;

        }

        .contatos{

            margin-left: 19.7em;
            margin-top: -17.9em;
            gap: 25px;

        }

        .extensoes{

            margin-top: -6.6em !important;

        }

    }

    /* ------------------------------ 300% ------------------------------ */
    @media (min-width: 600px) and (max-width: 659px) {


        .botao-navbar-personalização{

            width: 5.5em;

        }
        
        .botao-navbar-personalização .nome-user{

            display: none;

        }

        .image-container{

            margin-right: 39px !important;

        }

        .nav-link-custom{

            margin-left: 1em;

        }

        .personalizacao-links-navbar{

            width: 30em;
            margin-left: -1em;
            margin-top: 0.5em;

        }

        .personalizacao-links-navbar span{

            font-size: 10px;

        }

        .personalizacao-links-navbar svg{

            width: 16px;

        }

        .logo-ifpr{

            margin-left: -3em;

        }

        .links-footer{

            display: grid;
            gap: 10px;
            justify-content: start;
            margin-left: 5em;

        }

        .paginas{

            gap: 24px;

        }

        .contatos{

            margin-left: 15.4em;
            margin-top: -17.9em;
            gap: 25px;

        }

        .extensoes{

            margin-top: -6.6em !important;

        }

    }

    /* ------------------------------ 400% ------------------------------ */
    @media (min-width: 450px) and (max-width: 539px) {

        .logo-ifpr{

            margin-left: -3.7em;

        }

        .image{

            margin-bottom: 3px;

        }

        .image-container{

            margin-bottom: -4.2px;
            margin-left: -0.1em;

        }

        .personalizacao-links-navbar{

            margin-left: -2em;
            margin-top: 0.7em;
            width: 24em;

        }

        .personalizacao-links-navbar svg{

            width: 50px;
            margin-left: -1.1em;

        }

        .personalizacao-links-navbar span{

            display: none;

        }

        .links-footer{

            display: grid;
            gap: 10px;
            justify-content: start;
            margin-left: 2em;

        }

        .paginas{

            gap: 24px;

        }

        .contatos{

            margin-top: 2em;
            gap: 7em;

        }

        .extensoes{

            margin-top: -31.9em !important;
            margin-left: 17em;

        }

        .link-personalizacao{

            width: 2em;
            margin-left: 2.2em;

        }

    }

    /* ------------------------------ 500% ------------------------------ */
    @media (min-width: 300px) and (max-width: 449px) {

        .logo-ifpr{

            margin-left: -3.7em;

        }

        .image{

            margin-bottom: 3px;

        }

        .image-container{

            margin-bottom: -4px;
            margin-left: -0.1em;

        }

        .personalizacao-links-navbar{

            margin-top: 1.1em;
            margin-left: -2em;
            width: 22.5em;

        }

        .personalizacao-links-navbar svg{

            width: 40px;
            margin-left: -0.71em;

        }

        .personalizacao-links-navbar span{

            display: none;

        }

        .links-footer{

            display: grid;
            gap: 10px;
            justify-content: start;
            margin-left: 3em;

        }

        .paginas{

            gap: 24px;

        }

        .contatos{

            margin-top: 2em;
            gap: 1em;
            height: 25em;

        }

        .extensoes{

            margin-top: -7em !important;

        }

        .link-personalizacao{

            width: 2em;
            margin-left: 1.2em;

        }

    }


</style>


<script>
    
    document.addEventListener("DOMContentLoaded", function() {

        var mainContainer = document.getElementById('carregarNav');

        if (mainContainer) 
        {

            mainContainer.classList.remove('hidden');
            
        }

    });

    document.addEventListener("DOMContentLoaded", function() {

        var mainContainer = document.getElementById('carregarFoto');

        if (mainContainer) 
        {

            mainContainer.classList.remove('hidden');
            
        }

    });


    document.addEventListener("DOMContentLoaded", function() {

        var mainContainer = document.getElementById('carregarFooter');

        if (mainContainer) 
        {

            mainContainer.classList.remove('hidden');

        }
        
    });

</script>