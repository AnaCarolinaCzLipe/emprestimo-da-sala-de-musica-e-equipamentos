<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Início Administrador</title>

    <div class="container text-center container-principal">

        <div class="row">

            <div class="itens-gerenciamento-cima col shadow-sm p-3 rounded">

                <a href="{{route('equipamentos.index')}}" class="link-gerenciamento">

                    <button class="botao-gerenciamento">

                        <svg class="icone-arte" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="160" height="160" viewBox="0 0 256,256">
                            <g fill="#ffffff">
                                <g transform="scale(5.12,5.12)">
                                    <path d="M11,4c-3.85433,0 -7,3.14567 -7,7v28c0,3.85433 3.14567,7 7,7h28c3.85433,0 7,-3.14567 7,-7v-28c0,-3.85433 -3.14567,-7 -7,-7zM11,6h28c2.77367,0 5,2.22633 5,5v28c0,2.77367 -2.22633,5 -5,5h-28c-2.77367,0 -5,-2.22633 -5,
                                    -5v-28c0,-2.77367 2.22633,-5 5,-5zM25,13c-6.617,0 -12,5.383 -12,12c0,2.334 0.67241,4.59887 1.94141,6.54688c0.303,0.462 0.92181,0.59102 1.38281,0.29102c0.463,-0.302 0.59497,
                                    -0.92177 0.29297,-1.38477c-1.057,-1.623 -1.61719,-3.50812 -1.61719,-5.45312c0,-5.514 4.486,-10 10,-10c2.237,0 4.2988,0.74814 5.9668,1.99414c-3.391,3.4 
                                    -7.91056,8.85608 -9.60156,12.20508c-0.227,0.45 -0.0743,0.99639 0.3457,1.27539l1.58594,1.05664c0.414,0.276 0.96288,0.2108 1.29688,-0.1582c2.518,-2.781 6.16569,-8.24145 8.42969,
                                    -12.31445c1.236,1.664 1.97656,3.71541 1.97656,5.94141c0,1.793 -0.47967,3.55389 -1.38867,5.08789c-0.14,0.236 -0.17656,0.51825 -0.10156,0.78125l1.0293,3.64648l-3.54492,
                                    -1.06836c-0.271,-0.084 -0.56364,-0.04348 -0.80664,0.10352c-1.558,0.948 -3.3525,1.44922 -5.1875,1.44922c-0.553,0 -1,0.447 -1,1c0,0.553 0.447,1 1,1c2.05,0 4.05794,-0.52072
                                    5.83594,-1.51172l4.87695,1.46875c0.095,0.029 0.19011,0.04297 0.28711,0.04297c0.259,0 0.51217,-0.10111 0.70117,-0.28711c0.261,-0.256 0.36072,-0.63338 0.26172,-0.98437l-1.41406,
                                    -5.00195c0.951,-1.751 1.45117,-3.72156 1.45117,-5.72656c0,-3.01 -1.12198,-5.75623 -2.95898,-7.86523c0.822,-1.664 1.23498,-2.85877 0.95898,-3.13477c-0.267,-0.267 -1.24427,
                                    0.39175 -2.57227,1.59375c-2.045,-1.618 -4.62273,-2.59375 -7.42773,-2.59375zM24.5,17c-0.828,0 -1.5,0.672 -1.5,1.5c0,0.828 0.672,1.5 1.5,1.5c0.828,0 1.5,-0.672 1.5,-1.5c0,
                                    -0.828 -0.672,-1.5 -1.5,-1.5zM19.5,20c-0.828,0 -1.5,0.672 -1.5,1.5c0,0.828 0.672,1.5 1.5,1.5c0.828,0 1.5,-0.672 1.5,-1.5c0,-0.828 -0.672,-1.5 -1.5,-1.5zM18.5,26c-0.828,
                                    0 -1.5,0.672 -1.5,1.5c0,0.828 0.672,1.5 1.5,1.5c0.828,0 1.5,-0.672 1.5,-1.5c0,-0.828 -0.672,-1.5 -1.5,-1.5zM20.39844,31.33203c-1.02708,-0.087 -2.16633,0.45453 -2.83008,
                                    2.39453c-0.346,1.01 -2.22852,1.86523 -2.22852,1.86523c0,0 1.19922,1.4082 4.19922,1.4082c3,0 4.23694,-3.536 2.46094,-5c-0.40912,-0.33713 -0.98531,-0.61577 -1.60156,
                                    -0.66797z">
                                    </path>
                                </g>
                            </g>
                        </svg>

                        <span class="nome-botao-equipamento">Equipamentos</span>

                    </button>

                </a>

            </div>

            <div class="itens-gerenciamento-cima col shadow-sm p-3 rounded">

                <a href="{{route('gruposmusicais.inicio-grupos')}}">
                    
                    <button class="botao-gerenciamento">

                        <svg class="icone-musica" xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="white" class="bi bi-music-note-beamed" viewBox="0 0 16 16">
                            <path d="M6 13c0 1.105-1.12 2-2.5 2S1 14.105 1 13s1.12-2 2.5-2 2.5.896 2.5 2m9-2c0 1.105-1.12 2-2.5 2s-2.5-.895-2.5-2 1.12-2 2.5-2 2.5.895 2.5 2"/>
                            <path fill-rule="evenodd" d="M14 11V2h1v9zM6 3v10H5V3z"/>
                            <path d="M5 2.905a1 1 0 0 1 .9-.995l8-.8a1 1 0 0 1 1.1.995V3L5 4z"/>
                        </svg>            
                                
                        <span class="nome-botao">Bandas</span>
                            
                    </button>

                </a>

            </div>

        </div>

        
        <div class="row">

            <div class="itens-gerenciamento-baixo col shadow-sm p-3 rounded">

                <a href="{{ route('admin.lista-usuarios') }}">

                    <button class="botao-gerenciamento">

                        <svg class="icones" xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#ffffff" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>

                        <span class="nome-botao">Usuários</span>

                    </button>

                </a>
                    
            </div>

            <div class="itens-gerenciamento-baixo col shadow-sm p-3 rounded">

                <a href="{{ route('ajuda.adminajuda') }}">

                    <button class="botao-gerenciamento">

                        <svg class="icones" xmlns="http://www.w3.org/2000/svg" width="120" height="120" fill="#ffffff" class="bi bi-book" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                        </svg>

                        <span class="livrinho">Manual do Admin</span>

                    </button>
                    
                </a>

            </div>

        </div>

    </div>

    @include('footer.footer')

</x-app-layout>

<style>

    *{

        text-decoration: none !important;

    }

    .main{

        background-color: #ffdede;

    }

    .container-principal{

        margin-bottom: 7em;
        height: 82.2vh;

    }

    .itens-gerenciamento-cima, .itens-gerenciamento-baixo{

        max-width: 35em;
        height: 20em;
        text-shadow: 0 0 1px rgb(0, 0, 0);
        color: white;
        text-align: center;
        background-color: #EF9A9A !important;
        margin: 40px;
        
    }

    .itens-gerenciamento-cima:hover, .itens-gerenciamento-baixo:hover{

        transition: 0.5s;
        background-color: #fc8686 !important;
        transform: scale(1.1);

    }

    .icones{

        position: relative;
        top: 1%;
        left: 3em;

    }

    .nome-botao, .nome-botao-equipamento,.livrinho{

        color: white;
        font-size: 25px;

    }


    .nome-botao-equipamento{

        position: relative;
        bottom: 3.2em;

    }

    .nome-botao{

        position: relative;
        bottom: 2.5em;

    }
    .livrinho{

        position: relative;
        left: 2em;
        bottom: 2.5em;

    }

    .botao-gerenciamento{

        width: 20em;
        height: 20em;

    }
    .icone-musica{

        position: relative;
        left: 4em;
        top: 0.6em;

    }

    .botao-gerenciamento{

        width: 33.5em;    
        height: 19em;

    }

    /* -------------------------------------------------------- Ajustamento da Tela -------------------------------------------------------- */

    @media (min-width: 1400px) and (max-width: 1599px) {

        .personalizacao-footer{

            margin-top: 20em;

        }

    }

    /* ------------------------------ 150% ------------------------------ */

    @media (min-width: 1200px) and (max-width: 1499px) {

        .itens-gerenciamento-cima, .itens-gerenciamento-baixo{

            max-width: 30em;

        }

        
        .botao-gerenciamento{

            width: 28EM;
            height: 18EM;

        }

        .itens-gerenciamento-cima span{

            margin-left: 2em;

        }

        .itens-gerenciamento-baixo span{

            margin-left: 2em;

        }

        .personalizacao-footer{

            margin-top: 20em;

        }

    }

    /* ------------------------------ 175% ------------------------------ */
    @media (min-width: 1050px) and (max-width: 1199px) { 

        .itens-gerenciamento-cima, .itens-gerenciamento-baixo{

            max-width: 25em;

        }
        .botao-gerenciamento{

            width: 23EM;
            height: 18EM;

        }

        .icones, .icone-musica, .icone-arte{

            position: relative;
            top: 10px;
            left: 7.5em;

        }

        .itens-gerenciamento-cima a, .itens-gerenciamento-baixo a{

            margin-top: 2em;

        }

        .itens-gerenciamento-baixo span, .itens-gerenciamento-cima span{

            position: relative;
            top: -0.1em;

        }

        .icone-arte{

            left: 6.2em;
            margin-bottom: 1em;
            
        }

        .livrinho{

            margin-left: -4em !important;

        }

        .personalizacao-footer{

            margin-top: 30em;

        }

    }
    /* ------------------------------ 200% ------------------------------ */

    @media (min-width: 900px) and (max-width: 1049px) {

        .itens-gerenciamento-cima, .itens-gerenciamento-baixo{

            margin-left:5em;

        }

        .botao-gerenciamento{

            width: 23EM;
            height: 18EM;

        }

        .icones, .icone-musica, .icone-arte{

            position: relative;
            top: 10px;
            left: 7.5em;

        }

        .itens-gerenciamento-cima a, .itens-gerenciamento-baixo a{

            margin-top: 2em;

        }

        .itens-gerenciamento-baixo span, .itens-gerenciamento-cima span{

            position: relative;
            top: -0.1em;

        }

        .icone-arte{

            left: 6.2em;
            margin-bottom: 1em;

        }

        .livrinho{

            margin-left: -4em !important;

        }

        .personalizacao-footer{

            margin-top: 80em;

        }

    }
    
    /* ------------------------------ 250% ------------------------------ */
    @media (min-width: 750px) and (max-width: 899px) {


        .itens-gerenciamento-cima, .itens-gerenciamento-baixo{

            margin-left:3em;

        }

        .botao-gerenciamento{

            width: 23EM;
            height: 18EM;

        }

        .icones, .icone-musica, .icone-arte{

            position: relative;
            top: 10px;
            left: 7.5em;

        }

        .itens-gerenciamento-cima a, .itens-gerenciamento-baixo a{

            margin-top: 2em;

        }

        .itens-gerenciamento-baixo span, .itens-gerenciamento-cima span{

            position: relative;
            top: -0.1em;

        }

        .icone-arte{

            left: 6.2em;
            margin-bottom: 1em;

        }

        .livrinho{

            margin-left: -4em !important;

        }

        .personalizacao-footer{

            margin-top: 90em;

        }

    }

     /* ------------------------------ 300% ------------------------------ */
     @media (min-width: 600px) and (max-width: 659px) {


        .itens-gerenciamento-cima, .itens-gerenciamento-baixo{

            max-width: 18em;
            height: 16em;
            margin-left:8em;

        }

        .botao-gerenciamento{

            width: 16em;
            height: 14em;

        }

        .icones, .icone-musica, .icone-arte{

            position: relative;
            top: -26px;
            left: 4em;

        }

        .itens-gerenciamento-baixo span, .itens-gerenciamento-cima span{

            position: relative;
            top: -1.5em;
            margin-right: -0.5em;

        }

        .icone-arte{

            left: 3em;
            margin-bottom: 1em;

        }

        .livrinho{

            margin-left: -4em !important;

        }

        .personalizacao-footer{

            margin-top: 80em;

        }

    }
    
    /* ------------------------------ 400% ------------------------------ */
    @media (min-width: 450px) and (max-width: 539px) {
    
        .itens-gerenciamento-cima, .itens-gerenciamento-baixo{

            max-width: 9em;
            height: 9em;
            margin-left:3em;

        }

        .botao-gerenciamento{

            width: 4em;
            height: 1em;

        }

        .icones,.icone-arte{

            position: relative;
            width: 60px;
            top: -25px;
            margin-left: -3em;

        }

        .icone-musica{

            position: relative;
            width: 60px;
            top: -20px;
            margin-left: -3.7em;

        }

        .itens-gerenciamento-baixo span, .itens-gerenciamento-cima span{

            position: relative;
            font-size: 14px;
            top: -4em;

        }

        .icone-arte{

            left: 2.7em;
            width: 70px;
            margin-bottom: -1.5em;
            margin-top: -0.7em;

        }

        .livrinho{

            margin-left: -4em !important;

        }

        .itens-gerenciamento-cima .nome-botao{

            margin-left: 0.6em;

        }

        .nome-botao-equipamento{

            margin-left: -0.9em;

        }

        .personalizacao-footer{

            margin-top: 20em;

        }

    }

    /* ------------------------------ 500% ------------------------------ */
    @media (min-width: 300px) and (max-width: 449px) {

        .container-principal{

            margin-top: -2em;

        }
        .itens-gerenciamento-cima, .itens-gerenciamento-baixo{

            margin-top: 5em;
            max-width: 9em;
            height: 6.9em;
            margin-left:2em;

        }

        .itens-gerenciamento-baixo{

            margin-top: -1em;

        }

        .botao-gerenciamento{

            width: 4em;
            height: 0.1em;

        }

        .icones,.icone-arte{

            position: relative;
            width: 60px;
            top: -30px;
            margin-left: -3em;

        }

        .icone-musica{

            position: relative;
            width: 60px;
            top: -30px;
            margin-left: -3.7em;

        }

        .itens-gerenciamento-baixo span, .itens-gerenciamento-cima span{

            display: none;

        }

        .icone-arte{

            left: 2.7em;
            width: 70px;
            margin-bottom: -1em;
            margin-top: -1em;

        }

        .livrinho{

            margin-left: -3.9em !important;

        }

        .itens-gerenciamento-cima .nome-botao{

            margin-left: 1em;

        }

        .nome-botao-equipamento{

            margin-left: -0.9em;

        }

        .personalizacao-footer{

            margin-top: 15em;

        }

    }

</style>
