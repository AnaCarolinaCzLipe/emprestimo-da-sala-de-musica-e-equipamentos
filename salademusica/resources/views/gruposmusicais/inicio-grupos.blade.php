<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Grupos Musicais</title>

    <div class="container">

        @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Controlador')

            <div class="botao-criar">

                <a href="{{route("gruposmusicais.create-form")}}">

                    <button>Criar Novos Grupo</button>

                </a>

            </div>

        @else

            <div class="botao-oculto">

                <a>

                    <button>ㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤㅤ</button>

                </a>

            </div>

        @endif

        @if($gruposMusicais->isNotEmpty())

            <div class="container-grupos">

                <div class="row">

                    @foreach($gruposMusicais as $index => $grupo)

                        @if ($index % 2 == 0)

                            <div class="informacoes-grupos-div col-md-6">

                                <div class="grupos mb-4">

                                    <div class="imagem-grupos-div">

                                        @if ($grupo->fotoGrupo)

                                            @php

                                                $fotos = json_decode($grupo->fotoGrupo, true) ?? [];

                                            @endphp
              
                                            @if (is_array($fotos) && count($fotos) > 0 && !in_array(null, $fotos))

                                                <img class="imagem-grupos" src="{{ asset(reset($fotos)) }}">

                                            @else

                                                <span class="sem-foto"> Nenhuma foto foi selecionada</span>

                                            @endif

                                        @endif

                                    </div>

                                    <div class="informacoes-grupo">

                                        <div class="nome-titulo">

                                            <h2>{{$grupo->nomeGrupo}}</h2>

                                            <p>{{ \Illuminate\Support\Str::limit($grupo->informacaoGrupo, 200, '...') }}</p>

                                        </div>

                                        <div class="botoes">

                                            <a href="{{route('gruposmusicais.informacoes-grupo', $grupo->id)}}">

                                                <button class="botao-conheca">Conheça Mais Sobre</button>

                                            </a>

                                        </div>

                                    </div>

                                    @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Controlador')

                                        <div class="botoes-admin">

                                            <a href="{{route('gruposmusicais.editar-grupos-form', $grupo->id)}}">
            
                                                <button class="botao-editar">
            
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                    </svg>
            
                                                </button>
            
                                            </a>

                                            <button class="botao-deletar btn btn-danger" onclick="on({{ $index }})">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                                    <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                                                </svg>

                                            </button>


                                            <div id="overlay-{{ $index }}" class="overlay" onclick="off({{ $index }})">

                                                <div class="texto-informacoes">

                                                    <div id="text">

                                                        <h2> Deseja Mesmo Excluir Este Grupo? </h2>

                                                        <p> Após a exclusão, o grupo será deletado <b>permanentemente </b>, considere isso a sua última vez vendo ele.</p>


                                                        <div class="botoes-exclusão">

                                                            <form class="excluir-botao" action="{{ route('gruposmusicais.deletar-grupo', $grupo->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger">Sim, estou consciente que o grupo vai ser deletado permanentemente</button>

                                                            </form>

                                                            <button style="margin-left: 1em; height: 2.4em;" class="botao-cancelar btn btn-secondary">Cancelar</button>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
            
                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endif

                    @endforeach

                </div>
            
                <div class="row">

                    @foreach($gruposMusicais as $index => $grupo)

                        @if ($index % 2 != 0)

                            <div class="informacoes-grupos-div col-md-6">

                                <div class="grupos mb-4">

                                    <div class="imagem-grupos-div">

                                        @if ($grupo->fotoGrupo)

                                            @php

                                                $fotos = json_decode($grupo->fotoGrupo, true) ?? [];

                                            @endphp

                                    
                                            @if (is_array($fotos) && count($fotos) > 0)

                                                <img class="imagem-grupos" src="{{ asset(reset($fotos)) }}">


                                            @else

                                                <span class="sem-foto"> Nenhuma foto foi selecionada</span>

                                            @endif

                                        @endif

                                    </div>

                                    <div class="informacoes-grupo">

                                        <div class="nome-titulo">

                                            <h2>{{$grupo->nomeGrupo}}</h2>

                                            <p>{{ \Illuminate\Support\Str::limit($grupo->informacaoGrupo, 200, '...') }}</p>

                                        </div>

                                        <div class="botoes">

                                            <a href="{{route('gruposmusicais.informacoes-grupo', $grupo->id)}}">

                                                <button class="botao-conheca">Conheça Mais Sobre</button>

                                            </a>

                                        </div>

                                    </div>

                                        @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Controlador')

                                        <div class="botoes-admin">

                                            <a href="{{route('gruposmusicais.editar-grupos-form', $grupo->id)}}">
            
                                                <button class="botao-editar">
            
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                    </svg>
            
                                                </button>
            
                                            </a>

                                            <button type="button" class="botao-deletar btn btn-danger" onclick="on({{ $index }})">

                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                                    <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                                                </svg>

                                            </button>

                                            <div id="overlay-{{ $index }}" class="overlay" onclick="off({{ $index }})">

                                                <div class="texto-informacoes">

                                                    <div id="text">

                                                        <h2> Deseja Mesmo Excluir Este Grupo? </h2>

                                                        <p> Após a exclusão, o grupo será deletado <b>permanentemente </b>, considere isso a sua última vez vendo ele.</p>


                                                        <div class="botoes-exclusão">

                                                            <form class="excluir-botao" action="{{ route('gruposmusicais.deletar-grupo', $grupo->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="btn btn-danger">Sim, estou consciente que o grupo vai ser deletado permanentemente</button>

                                                            </form>

                                                            <button style="margin-left: 1em; height: 2.4em;" class="botao-cancelar btn btn-secondary">Cancelar</button>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    @endif

                                </div>

                            </div>

                        @endif

                    @endforeach

                </div>
                
            </div>

        @else

        <div style="display: flex; justify-content: center; background-color: #5eaa5e; padding: 10px; margin-top: 20em; border-radius: 10px; font-weight: 500;">

            <p>Nenhum grupo foi adicionado ainda. Volte novamente mais tarde para verificar se adicionaram algum grupo musical</p>

        </div>

        @endif

        <div class="paginacao">

            {{ $gruposMusicais->links() }}

        </div>
        
    </div>
    
    @include('footer.footer')

</x-app-layout>


<style>

    *{

        text-decoration: none !important;

    }

    .main{

        background-color: #c2fcc2;

    }

    .personalizacao-footer{

		margin-top: 40em;

	}

    .container{

        display: grid;
        justify-content: center;

    }

    .container-grupos{

        width: max-content;
        height: max-content;
        margin-left: -6em;

    }

    .grupos{

        display: flex;
        background-color: #83af83;
        width: 50em;
        height: 40em;
        border-radius: 30px;

    }

    .informacoes-grupos-div{

        float: left;
        width: 50%;
        box-sizing: border-box; 
        padding-left: 150px;
        border-radius: 5px;
        margin-top: 5em;
        margin-bottom: 5em;

    }

    .imagem-grupos-div{

        position: relative;
        width: 30em;
        height: 30em;
        max-width: 30em;
        max-height: 30em;   
        margin-top: 5em;
        margin-left: -4em;

    }

    .imagem-grupos{

        position: absolute;
        width: 30em;
        height: 30em;
        border-radius: 30px;
        border:5px dotted rgb(76, 105, 69);

    }

    .informacoes-grupo{

        width: 24em;
        padding-right: 30px;
        margin-top: 5em;
        margin-left: 2.5em;
        height: max-content;

    }

    .informacoes-grupo h2{

        margin-bottom: 0.8em;

    }

    .botoes{

        margin-top: 1.5em;
        text-align: center;

    }

    .botao-criar{

        display: flex;
        justify-content: center;
        
    }

    .botao-oculto{

        position: relative;
        display: flex;
        justify-content: center;
         

    }

    .botao-oculto a{

        color:#c2fcc2 !important;


    }

    .botao-oculto button{

        cursor: context-menu;

    }

    .botao-criar button{

        background-color: pink;
        padding: 10px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        color: rgb(0, 0, 0);
        border: 2px solid palevioletred;
        border-top: none;
        transition: 0.5s;

    }

    .botao-criar button:hover{

        background-color: rgb(253, 148, 166);
        transition: 0.5s;

    }

    .botoes-admin{

        position: absolute;
        display:flex;
        gap: 10px;
        margin-left: 44em;
        margin-top: 1em;

    }

    .botao-editar{

        background-color: rgb(75, 138, 75);
        color: black;
        padding: 10px;
        border-radius: 10px;
        transition: 0.5s;

    }

    .botao-editar:hover{

        transition: 0.5s;
        background-color: #407440;

    }

    .botao-deletar{

        padding: 10px;
        border-radius: 10px;

    }

    .paginacao{

        display: flex;
        justify-self: center;
        width: max-content;
        height: 5em;

    }

    .pagina-atual{

        background-color: #83af83 !important;
        color: black;
        border: 2px solid #407440 !important;


    }

    .paginas-pagination{

        background-color: #83af83 !important;
        color: black;
        border: 2px solid #407440 !important;

    }
    
    .paginacao-links{

        background-color: #c2fcc2 !important;

    }

    .paginacao-div{
        
        box-shadow: none !important;

    }

    .proximo-seta{

        background-color: #83af83 !important;
        color: black;
        border: 2px solid #407440 !important;
        transition: 0.5s;

    }

    .anterior-seta{

        background-color: #83af83 !important;
        color: black;
        border: 2px solid #407440 !important;
        border-top-left-radius: 4px;
        border-bottom-left-radius: 4px;
        transition: 0.5s;

    }

    .proximo-seta:hover, .anterior-seta:hover, .pagina-atual:hover, .paginas-pagination:hover, .anterior:hover, .proximo:hover{

        transition: 0.5s;
        color: #a0fda0;

    }

    .anterior, .proximo{

        background-color: #83af83 !important;
        color: black;
        border: 2px solid #407440 !important;

    }

    .overlay {

        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
        z-index: 2;
        cursor: pointer;

    }

    #text{

        position: absolute;
        top: 30%;
        left: 50%;
        font-size: 50px;
        width: 23em;
        height: 5em;
        border-radius: 10px;
        box-shadow: 5px 10px #888888;
        border: 2px solid black;
        background-color: rgb(255, 255, 255);
        color:rgb(5, 0, 0);
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        padding: 1em;

    }

    #text p{

        font-size: 20px;

    }

    .botoes-exclusão{

        display: flex;
        justify-content: center;

    }

    .botao-conheca{

        padding: 10px;
        color: white;
        border-radius: 10px;
        border: 2px solid rgb(57, 109, 57);
        background-color: #5d8a5d;
        transition: 0.5s;

    }

    .botao-conheca:hover{

        background-color: #5eaa5e;
        transition: 0.5s;

    }

    .sem-foto{

        margin-left: 10em;

    }

    @media (min-width: 7680px) {

        .personalizacao-footer{

            margin-top: 195.7em;

        }

    }

    @media (min-width: 5760px) and (max-width: 7679px) {

        .personalizacao-footer{

            margin-top: 136.5em;

        }


    }

    @media (min-width: 3600px) and (max-width: 4799px) { 

        .personalizacao-footer{

            margin-top: 74.8em;

        }
        
    }

    /* 110% */

    @media (min-width: 1600px) and (max-width: 1799px) {

        .grupos{

            margin-left: 0.8em;

        }

        .informacoes-grupos-div{

            margin-right: -3.7em;

        }

    }
    /* 125%   */

    @media (min-width: 1400px) and (max-width: 1599px) {

        .row{

            display: grid !important;

        }

        .container-grupos{

            margin-left: -9em;

        }

    }

    /* 150% */
   	@media (min-width: 1200px) and (max-width: 1499px) {

        .row{

            display: grid !important;

        }

        .container-grupos{

            margin-left: -9em;

        }

        #text{

            width: 15em;
            height: 6em;

        }

    }

    /* 175% */
    @media (min-width: 1050px) and (max-width: 1199px) {

        .row{

            display: grid !important;

        }

        .container-grupos{

            margin-left: -4em;

        }

        #text{

            width: 15em;
            height: 6em;

        }

    }

    /* 200% */
    @media (min-width: 900px) and (max-width: 1049px) {

        .row{

            display: grid !important;

        }

        .container-grupos{

            margin-left: -7em;

        }
    
        #text{

            width: 15em;
            height: 6em;

        }

    }

    /* 250% */
    @media (min-width: 750px) and (max-width: 899px) {

        .row{

            display: grid !important;

        }

        .container-grupos{

            margin-left: -5em;

        }

        .grupos{

            width: 42em;

        }

        .paginacao{

            margin-left: 1em;

        }

        .botoes-admin{

            margin-left: 35em;

        }

        #text{

            top: 50%;
            width: 15em;
            height: 6em;

        }

        .sem-foto{

            margin-left: 8em;

        }

    }

    /* 300% */
    @media (min-width: 600px) and (max-width: 659px) {

        .row{

            display: grid !important;

        }

        .container-grupos{

            margin-left: -8.5em;

        }

        .grupos{

            width: 37em;
            display: grid;
            justify-content: center;

        }

        .paginacao{

            margin-left: 1em;

        }

        .nome-titulo{

            margin-top: 14em;

        }

        .informacoes-grupo h2{

            width: 18em;

        }

        .imagem-grupos-div{

            margin-bottom: -18em;
            height: 16em;

        }

        .botoes-admin{

            margin-left: 31em;
            margin-top: 0.4em;

        }

        .imagem-grupos{

            margin-top: -2em;
            margin-left: 2.5em;
            width: 30em;
            height: 20em;

        }

        #text{

            top: 50%;
            width: 12em;
            height: 6em;

        }

    }

    /* 400% */
    @media (min-width: 450px) and (max-width: 539px) {

        .row{

            display: grid !important;

        }

        .container-grupos{

            margin-left: -9em;

        }

        .grupos{

            width: 28.2em;
            display: grid;
            justify-content: center;

        }

        .imagem-grupos-div{

            height: 16em;
            margin-bottom: -18em;

        }

        .botoes-admin{

            margin-top: 0.5em;
            margin-left: 22.5em;

        }

        .imagem-grupos{

            margin-top: -2em;
            margin-left: 4.5em;
            width: 25em;
            height: 20em;

        }

        .nome-titulo{

            margin-top: 14em;

        }

        #text{

            top: 50%;
            width: 9em;
            height: 4.5em;

        }

        #text p{

            font-size: 15px;

        }

        #text h2{

            margin-top: -1.5em;

        }

        #text button{

            font-size: 12px;

        }

        .botoes-exclusão{

            margin-top: -0.4em;

        }

    }

    /* 500% */
    @media (min-width: 300px) and (max-width: 449px) {

        .row{

            display: grid !important;
            width: 5em;

        }

        .container-grupos{

            margin-left: -12.5em;

        }

        .grupos{

            width: 22em;
            display: grid;
            justify-content: center;

        }

        .imagem-grupos-div{

            margin-bottom: -18em;
            width: 20em;
            height: 14em;

        }

        .botoes-admin{

            margin-top: 0.5em;
            margin-left: 16em;

        }

        .imagem-grupos{

            margin-top: -2em;
            margin-left: 2em;
            width: 20em;
            height: 16em;

        }
        
        .informacoes-grupo{

            margin-left: -1.5em;
            margin-top: 2em;
            width: 5em;

        }

        .nome-titulo{

            margin-top: 11em;
            width: 18em;

        }

        .nome-titulo p{

            font-size: 14px;

        }

        .botoes{

            margin-left: 4em;
            width: max-content;

        }

        #text{

            top: 50%;
            width: 7.2em;
            height: 3.6em;
            overflow-x: scroll;

        }

        #text p{

            font-size: 15px;

        }

        #text h2{

            margin-top: -1.5em;

        }

        #text button{

            font-size: 12px;

        }

        .botoes-exclusão{

            margin-top: -0.1em;
            display: grid;

        }

        .botao-cancelar{

            margin-left: -0.1em !important;

        }

        .sem-foto{

            font-size: 12px;
            margin-left: 8em;

        }

    }

</style>

<script>

    function on(index) {

        document.getElementById("overlay-" + index).style.display = "block";

    }

    function off(index) {

        document.getElementById("overlay-" + index).style.display = "none";

    }

</script>