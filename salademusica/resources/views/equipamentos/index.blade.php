<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		        
    <title> Equipamentos da Sala de Música</title>
    
	<header class="header-aluno bg-white shadow">

        <div class="header-chave">

            <h1> Gerenciamento de Equipamentos</h1>

        </div>

        <div class="header-texto-div">

            <p class="header-texto">
                
                Nosso site oferece uma ferramenta completa de gerenciamento de equipamentos, 
                permitindo que você mantenha um inventário atualizado de todos os instrumentos e dispositivos disponíveis.
                 
            </p>

        </div>

        <div class="header-botoes">

            <div>

                <a href="{{route('ajuda.adminajuda')}}">

                    <button class="botao-header-aluno">
            
                        <span>Saiba Mais</span>

                        <svg class="saiba-botao" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                        </svg>
                        
                    </button>

                </a>

            </div>

        </div>

    </header>

    <section class="conteudo-principal bg-white py-10 mx-auto px-4 sm:px-6 lg:px-8">

		<div class="mx-auto py-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">

            <div style="display: flex; gap:1.5em;">

                <button class="criar-solicitacao justify-center">

                    <a class="link-cabeçalho" href="{{ route('equipamentos.create') }}">
            
                        <svg class="mais-botao" xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                                
                    </a>
                
                </button>

                <div class="lixeira">

                    <button style="display:none; width: 2.5em; height: 2.5em; margin-top: -2px;" class="btn btn-outline-danger" type="button" id="botao-deletar" onclick="onDeletar()">

                        <svg style="margin-left: -3.5px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                            <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                        </svg>
                    
                    </button>

                </div>

            </div>

            <form id="deleteForm" method="POST" action="{{ route('equipamentos.deletar-multiplos-equipamentos') }}">
                @csrf
                @method('DELETE')

                <div id="overlay-deletar" onclick="offDeletar()">

                    <div class="texto-informacoes">

                        <div id="text-deletar">

                            <h2> Deseja Mesmo Excluir Esta Solicitação? </h2>

                            <p> Após a exclusão, a solicitação será deletada <b>permanentemente</b>, considere isso a sua última vez vendo ela.</p>

                            <div class="botoes-exclusão">

                                <button type="submit" class="btn btn-danger">Sim, estou consciente que o grupo vai ser deletado permanentemente</button>

                                <button type="button" style="margin-left: 1em; margin-top:-0.1em; height: 2.4em;" class="botao-cancelar btn btn-secondary">Cancelar</button>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="table-responsive-xxl">

                    <table class="table">
                        
                        <thead>
                                                
                            <th scope="col" width="5%">Nome</th>

                            <th scope="col" width="5%">Características</th>
                            
                            <th class="borda-status" scope="col" width="2%">Ações</th>
                                    
                        </thead>

                        @foreach($equipamentos as $equipamento)

                            <tbody>

                                <tr>
                                                                        
                                    <td><span class="informacoes-usuario">{{ $equipamento->nome }}</span></td>

                                    <td><span class="informacoes-usuario">{{ $equipamento->tipoEquipamento }}</span></td>

                                    <td class="borda-status-usuario">

                                        <div class="botoes-acoes">

                                            <div class="botao-status-usuario">

                                                <a class="mostrar-botao" href="{{ route('equipamentos.edit', $equipamento->id) }}">

                                                    <svg class="editar-botao" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                    </svg>

                                                </a>

                                            </div>

                                            <div class="botao-status-usuario">

                                                <input type="checkbox" name="id[]" id="selecionar-todos" value="{{ $equipamento->id }}">

                                            </div>

                                        </div>
                                        
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>
                        
                    <div class="paginacao">

                        {!! $equipamentos->links() !!}
                    
                    </div>

                </div>

            </div>

        </form>

	</section>
	
    @include('footer.footer')

</x-app-layout>
	
<style>
	
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');

    *{

        font-family: 'Inter', sans-serif;
        text-decoration: none !important;

    }

    .main{

        background-color: white;

    }

    .header-aluno{

        display: grid;
        text-align: center;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('../assets/images/solicitacaoequipamento.jpeg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-bottom: 1px solid #522104;
        margin-top: -3px;
        height: max-content;

    }

    .header-texto-div{

        padding: 6em;
        color: white;
        margin-bottom: 8em; 
        text-align: center;

    }
    
    h1{

        position: relative;
        padding-top: 0.5em;
        font-weight: bold;
        color: white;

    }

    .header-botoes{

        position: relative;
        bottom: 10em;

    }

    .botao-header-aluno{

        background-color: #c56bb9;
        display: inline-flex;
        padding: 10px;
        color: white;
        gap: 10px;
        border: 1px solid rgb(128, 0, 111);
        border-radius: 10px;
        width: 9em;
        transition: 0.5s;

    }

    .botao-header-aluno:hover{

        background-color: #520448;
        transition: 0.5s;

    }

    .excluir-botao:hover{

        transition: 0.5s;
        color: red !important;

    }

    .editar-botao:hover{

        color: #115204 !important;
        transition: 0.5s;

    }

    .botao-precisa-ajuda{

        position: absolute;
        margin-top: 8.2em;

    }

    .saiba-botao{

        margin-top: 0.1em;

    }

    .botoes-solicitacoes{

        display: flow-root;
        margin-bottom: 2em;
        justify-content: center;

    }

    .conteudo-principal{

        position: relative;
        background-color: #ececec;
        border-top: none;
        height: 72.5vh;
        

    }

    table{

        position: relative;
        z-index: 1;

    }

    th{
        
        position: relative;
        background-color: #fcf7fb;
        text-align: center;

        
    }
    th, td{
        
        position: relative;
        padding: 30px !important;


    }

    td{

        text-align: center;
        background-color: #ffffff;

    }

    .mais-botao{

        position: relative;
        bottom: 1em;
        background-color: #fff2fd3b;
        border-radius: 10px;
        border:1px solid rgba(0, 0, 0, 0.247);
        color: rgb(253, 84, 253);
        transition: 0.5s;


    }

    .mais-botao:hover{

        background-color: #ffdefa3b;
        color: rgb(170, 0, 170);
        transition: 0.5s;

    }

    .ajuda-botao{

        position: relative;
        left: 95%;

    }

    .criar-solicitacao{

        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        position: relative;
        background: #ffffff;
        width: 2.5em;
        height: 2.5em;
        top: 0.8em;
        box-shadow: black;
        transition: 0.5s;

    }

    .excluir-botao,.editar-botao{

        display: inline-block;
        color: #4a4a4a;
        transition: 0.5s;  

    }

    .botoes-acoes{

        position: relative;
        display: flex;
        justify-content: center;    
        gap: 30px;

    }

    .paginacao{

        margin: auto;
        padding-right: 13em;
        width: 1%;
    }

    #overlay-deletar {

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

    #text-deletar{

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

    #text-deletar p{

        font-size: 20px;

    }
    

    .botoes-exclusão{

        display: flex;
        justify-content: center;

    }

    .botoes-exclusao{

        display: flex;
        gap: 0.5em;
        justify-content: center;

    }

    #selecionar-todos{

        border-radius:5px;
        background-color: rgb(247, 160, 175);
        border-color: rgb(170, 20, 125);

    }

    #selecionar-todos::after{

        border-color: rgb(170, 20, 125);

    }

    @media (min-width: 2200px) {

        .personalizacao-footer{

            margin-top: 50em;

        }

    }

    @media (min-width: 2000px) and (max-width: 2199px) {

        .personalizacao-footer{

            margin-top: 50em;

        }

    }

    @media (min-width: 0px) {

        .personalizacao-footer{

            margin-top: 70em;

        }

    }

    @media (min-width: 1600px) and (max-width: 1799px) {

        .personalizacao-footer{

            margin-top: 70em;

        }

    }

    @media (min-width: 1400px) and (max-width: 1599px) {

        .nome-usuario{

            display: inline-block;
            max-width: 15em; 
            overflow: hidden;
            margin-top: -1em;
            text-overflow: ellipsis;
            vertical-align: middle; 

        }

        .personalizacao-footer{

            margin-top: 70em;

        }

    }

    @media (min-width: 1200px) and (max-width: 1399px) {

        .nome-usuario{

            display: inline-block;
            max-width: 12em; 
            overflow: hidden;
            margin-top: -1em;
            text-overflow: ellipsis;
            vertical-align: middle; 

        }

    }

    @media (min-width: 1050px) and (max-width: 1199px) { 

        .nome-usuario{

            display: inline-block;
            max-width: 10em; 
            overflow: hidden;
            margin-top: -1em;
            text-overflow: ellipsis;
            vertical-align: middle; 

        }

        .status-posse{

            position: absolute;
            margin-top: 1em;
            margin-left: -3em;
            width: 6em;

        }

        #text-deletar, #text-deletar-admin{

            top:40%;
            width: 18em;
            height: 6em;

        }

        #text{

            height: 10em;

        }

    }

    @media (min-width: 900px) and (max-width: 1049px) {

        tr{

            font-size: 14px;

        }
        .nome-usuario{

            display: inline-block;
            max-width: 7em; 
            overflow: hidden;
            margin-top: -1em;
            text-overflow: ellipsis;
            vertical-align: middle; 

        }
        .status-posse{

            position: absolute;
            margin-top: 1em;
            margin-left: -3em;
            width: 6em;

        }

        #text-deletar, #text-deletar-admin{

            top:40%;
            width: 15em;
            height: 6em;

        }

        #text{

            height: 9em;

        }

    }

    @media (min-width: 750px) and (max-width: 899px) {

        tr{

            font-size: 14px;

        }

        .foto-usuario{

            margin-left: -1em;

        }

        .nome-usuario{

            display: inline-block;
            max-width: 6em; 
            overflow: hidden;
            margin-left: -1em;
            margin-top: -1em;
            text-overflow: ellipsis;
            vertical-align: middle; 

        }

        .status-posse{

            position: absolute;
            margin-top: 1em;
            margin-left: -3em;
            width: 6em;

        } 

        .botoes-acoes-usuario{

            margin-left: -1em;

        }

        .botao-confirmar, .botao-texto{

            font-size: 12px;

        }


        #text-deletar, #text-deletar-admin{

            top: 50%;
            width: 15em;
            height: 6em;

        }

        #text{

            width: 14em;
            height: 7.2em;

        }

        .nome-foto-texto{

            margin-top: -0.5em;
            height: 2.8em;

        }

        .nome-usuario-texto{

            color: black;
            margin-top: -0.3em;
            margin-left: 0.5em;

        }

    }

    @media (min-width: 600px) and (max-width: 659px) {

        tr{

            font-size: 12px;

        }

        .nome-usuario{

            display: inline-block;
            max-width: 6em; 
            overflow: hidden;
            margin-top: 3em;
            margin-left: -11em;
            text-overflow: ellipsis;
            vertical-align: middle; 

        }

        .status-posse{

            position: absolute;
            margin-top: 1em;
            margin-left: -3em;
            width: 6em;

        }  

        .botao-confirmar, .botao-texto{

            font-size: 12px;

        }

        #text-deletar, #text-deletar-admin{

            top: 50%;
            width: 12em;
            height: 6em;

        }

        .botoes-exclusão{

            margin-top: -0.5em;

        }

        #text{

            width: 12em;
            height: 5.4em;
            overflow-x: scroll;

        }

        .nome-foto-texto{

            margin-top: -0.5em;
            height: 2.8em;

        }

        .nome-usuario-texto{

            color: black;
            margin-top: -0.3em;
            margin-left: 0.5em;

        }

    }

    @media (min-width: 450px) and (max-width: 539px) {

        tr{

            font-size: 12px;

        }

        .foto-usuario{

            position: relative;

        }

        .nome-usuario{

            display: inline-block;
            position: relative;
            top: 1em;
            max-width: 6em; 
            margin-left: -11em;

        }
        .status-posse{

            position: absolute;
            margin-top: 1em;
            margin-left: -3em;
            width: 6em;

        } 

        .botoes-acoes-usuario{

            margin-left: -0.2em;

        }

        .botao-confirmar, .botao-texto{

            font-size: 12px;

        }

        .botoes-acoes-usuario svg{

            width: 17px;
            height: 17px;

        }

        #text-deletar, #text-deletar-admin{

            top: 50%;
            width: 9em;
            height: 4.5em;

        }

        #text-deletar p, #text-deletar-admin p{

            font-size: 15px;

        }

        #text-deletar h2, #text-deletar-admin h2{

            margin-top: -1.5em;

        }

        #text-deletar button, #text-deletar-admin button{

            font-size: 12px;

        }

        .botoes-exclusão{

            margin-top: -0.4em;

        }

        #text{

            width: 9em;
            height: 4em;
            overflow-x: scroll;

        }

        .nome-foto-texto{

            margin-top: -0.5em;
            height: 2.8em;

        }

        .nome-usuario-texto{

            margin-top: -0.3em;
            margin-left: 1em;

        }

        .titulo-texto{

            font-size: 20px;

        }

        .texto{

            font-size: 14px;

        }

    }

    @media (min-width: 300px) and (max-width: 449px) {

        tr{

            font-size: 12px;

        }

        .botoes-acoes-usuario{

            margin-left: -0.2em;

        }


        .botoes-acoes-usuario svg{

            width: 17px;
            height: 17px;

        }

        #text-deletar{

            top: 50%;
            width: 7.2em;
            height: 3.6em;
            overflow-x: scroll;

        }

        #text-deletar p{

            font-size: 15px;

        }

        #text-deletar h2{

            margin-top: -1.5em;

        }

        #text-deletar button{

            font-size: 12px;

        }

        .botoes-exclusão{

            margin-top: -0.1em;
            display: grid;

        }

        .botao-cancelar{

            margin-left: -0.1em !important;

        }

        .nome-foto-texto{

            margin-top: -0.5em;
            height: 2.8em;

        }

        .nome-usuario-texto{

            color: black;
            margin-top: -0.3em;
            margin-left: 1em;

        }

        .titulo-texto{

            font-size: 20px;

        }

        .texto{

            font-size: 14px;

        }

        .botoes-solicitacoes button{

            margin-bottom: 1em;

        }

    }

</style>

<script>

    function onDeletar() {

        document.getElementById("overlay-deletar").style.display = "block";

    }

    function offDeletar() {

        document.getElementById("overlay-deletar").style.display = "none";

    }

    document.addEventListener('DOMContentLoaded', function() {

        const selecionarTodos = document.getElementById('selecionar-todos');

        const checkBox = document.querySelectorAll('input[type="checkbox"][name="id[]"]');

        const botaoDeletar = document.getElementById('botao-deletar');

        let tempoAparecerBotaoDeletar;

        function ativarBotaoDeletar() {
            
            clearTimeout(tempoAparecerBotaoDeletar);

            const anyChecked = Array.from(checkBox).some(checkbox => checkbox.checked);

            if (anyChecked) {

                tempoAparecerBotaoDeletar = setTimeout(() => {

                    botaoDeletar.style.display = 'block';

                }, 200); 
                
            } else {

                botaoDeletar.style.display = 'none';

            }

        }

        selecionarTodos.addEventListener('change', function(e) {

            checkBox.forEach(checkbox => {

                checkbox.checked = e.target.checked;

            });

            ativarBotaoDeletar();

        });

        checkBox.forEach(checkbox => {

            checkbox.addEventListener('change', ativarBotaoDeletar);

        });

        ativarBotaoDeletar();

    });

</script>