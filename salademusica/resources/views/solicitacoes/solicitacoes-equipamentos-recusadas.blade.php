<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Solicitações de Equipamentos Rejeitadas</title>

    <header class="bg-white shadow">

        <div class="header-chave">

            <h1>Gerenciamento de Solicitações dos Equipamentos</h1>

        </div>

        <div class="header-texto-div">

            <p class="header-texto">
                
                As solicitações rejeitadas serão mostradas aqui, são armazenadas para que, caso alguma pessoa reclame de algo sobre sua solicitação, você poderá mostrar o motivo da rejeição. 
                As solicitações só podem ser excluídas, e nada mais.
            
            </p>

        </div>

        <div class="header-botoes">

            <div>

                <a href="#">

                    <button class="botao-header">
        
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

        <div class="botoes-solicitacoes">

            <a href="{{route('solicitacoes.index')}}">

                <button type="button" class="btn btn-secondary" style="background-color: pink; color:black; border-color: palevioletred; font-weight: 500">Solicitações Atuais</button>

            </a>

            <button type="button" class="btn btn-danger" disabled>Ver Solicitações Rejeitadas</button>

        </div>

        <div class="mx-auto py-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            
            <div style="display:flex; gap: 10px;">

                <div>

                    <button class="botao-selecionar-todos" id="selecionar-todos"> Selecionar Todos </button>

                </div>

                <div class="lixeira">

                    <button class="btn btn-outline-danger" id="botao-deletar" onclick="onDeletar()">

                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                            <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                        </svg>
                    
                    </button>

                </div>

            </div>

            <form id="deleteForm" method="POST" action="{{ route('solicitacoesequipamentos.deletar-multiplas-solicitacoes') }}">
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

                            <th class="borda-nome" scope="col" width="5%">Usuário</th>
                        
                            <th scope="col" width="1%">Motivo da Solicitação</th>

                            <th scope="col" width="1%">Equipamentos</th>

                            <th scope="col" width="1%">Contato</th>

                            <th scope="col" width="1%">Turma</th>

                            <th scope="col" width="3%">Dia do Empréstimo</th>
                                                        
                            <th scope="col" width="4%">Status</th>

                            <th class="borda-status" scope="col" width="1%">Ações</th>
                                       
                        </thead>

                        @foreach($solicitacoesEquipamentos as $solicitacao)

                            @if($solicitacao->status === 'Rejeitada' || $solicitacao->status === 'Alterada Rejeitada')

                                <div class="conteudo-solicitacoes" id="normais">

                                    <tbody>

                                        <tr>

                                            <td>

                                                <div class="nome-foto">
                                                        
                                                    @if($solicitacao->user->imagem === NULL)

                                                        <svg class="foto-usuario" xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" fill="#dad7da" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                                        </svg>
                        
                                                        
                                                    @elseif($solicitacao->user->imagem != NULL)
                                
                                                        <img class="foto-usuario" src="{{$solicitacao->user->imagem}}"/>
                                
                                                    @endif

                                                    <span class="nome-usuario">{{$solicitacao->user->nome}}</span>

                                                </div>
                                                    
                                            </td>
                    
                                            <td><button class="botao-texto btn btn-secondary" type="button" onclick="on({{ json_encode($solicitacao)}})">Visualizar texto</button></td>

                                            <div id="overlay" onclick="off()">

                                                <div class="texto-informacoes">

                                                    <div id="text">
                                                        

                                                    </div>

                                                </div>

                                            </div>

                                            <td>
                                                
                                                <span>

                                                    @if($solicitacao->equipamentos !== null)

                                                        @foreach($solicitacao->equipamentos as $equipamento)

                                                        <span style="position: relative; top:1em;">{{ $equipamento->nome }}{{ !$loop->last ? ', ' : '' }}</span>

                                                        @endforeach

                                                    @endif

                                                </span>

                                            </td>
                                            
                                            <td><span class="informacoes-usuario">{{$solicitacao->user->numeroTelefone}}</span></td>

                                            <td><span class="informacoes-usuario">{{$solicitacao->user->turma}} {{$solicitacao->user->anoSerie}}</span></td>

                                            <td><span class="informacoes-usuario">Das {{date('H:i',strtotime($solicitacao->horarioEntrada))}} até {{date('H:i',strtotime($solicitacao->horarioEntrada))}} no dia {{date('d/m', strtotime($solicitacao->diaEmprestimo))}}</span></td>

                                            @switch($solicitacao->status)

                                                @case('Rejeitada')

                                                    <td><span class="status-rejeitado">Rejeitada</span></td>

                                                @break

                                                @case('Alterada Rejeitada')

                                                    <td><span class="status-alterado-rejeitado">Alterada Rejeitada</span></td>

                                                @break

                                            @endswitch

                                            <td>
                                                
                                                <input type="checkbox" name="id[]" id="selecionar-solicitacao" value="{{ $solicitacao->id }}">
                                            
                                            </td>

                                        </tr> 

                                    </tbody>

                                </div>

                            @endif
                            
                        @endforeach

                </table>

            </div>

            <div class="paginacao">

                {!! $solicitacoesEquipamentos->links() !!}
            
            </div>
            
        </form>

        </div>

    </section>

    @include('footer.footer')

</x-app-layout>

<style>

    /* ------------------------------------ Header ------------------------------------*/

    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500&family=Open+Sans:wght@300;400;500;600&display=swap');

    *{

        font-family: 'Inter', sans-serif;
        text-decoration: none !important;

    }
    header{

        display: grid;
        text-align: center;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('../assets/images/solicitacaoequipamentoadmin.jpeg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-bottom: 1px solid #b300b3;
        margin-top: -3px;
        height: max-content;

    }

    .main{

        background-color: white;

    }

    .header-texto-div{

        position: relative;
        padding: 6em;
        margin-bottom: 8em; 
        color: white;

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

    .botao-header{

        background-color: #c56bb6;
        display: inline-flex;
        padding: 10px;
        color: white;
        gap: 10px;
        border: 1px solid rgb(128, 0, 122);
        border-radius: 10px;
        width: 9em;
        transition: 0.5s;
    }

    .botao-precisa-ajuda{

        position: absolute;
        margin-top: 8.2em;
    }

    .saiba-botao{

        margin-top: 0.1em;

    }

    .botao-header:hover{

        background-color: #960683;
        transition: 0.5s;

    }

    #botao-deletar{

        display: none;
        padding: 8px;

    }
    
    /* ------------------------------------ Botões mudar solicitação ------------------------------------ */

    .botoes-solicitacoes{

        display: flow-root;
        margin-bottom: 2em;
        text-align: center;

    }

    /* ------------------------------------ Tabela ------------------------------------ */

    .conteudo-principal{

        position: relative;
        background-color: #ececec;
        border-top: none;
        margin-bottom: 20em;
        

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
        padding: 15px !important;


    }

    td{

        text-align: center;
        background-color: #ffffff;
        margin-top: 20px;

    }

    #selecionar-solicitacao{

        border-radius:5px;
        background-color: rgb(247, 160, 175);
        border-color: rgb(170, 20, 125);
        margin-top: 1.5em;
    }

    #selecionar-solicitacao::after{

        border-color: rgb(170, 20, 125);

    }

    .status-rejeitado{

        position: relative;
        border: 2px solid rgb(136, 0, 0);
        padding: 0.2em;
        top: 1.4em;
        border-radius: 10px;
        color: black !important;
        background-color: rgb(252, 64, 64); 

    }

    .status-alterado-rejeitado{

        position: relative;
        border: 2px solid rgb(170, 66, 66);
        padding: 0.2em;
        top: 1.4em;
        border-radius: 10px;
        color: black !important;
        background-color: rgb(250, 120, 120); 

    }

     .informacoes-usuario{

        position: relative;
        top: 1.6em;

    }

    .nome-usuario{

        position: relative;
        bottom: 2.2em;

    }
    .nome-foto{

        position: relative;
        text-align: center;

    }

    .foto-usuario{

        position: relative;
        top:0.5em;
        color:#dad7da;
        height:60px; 
        width:60px;
        margin-right:5em;
        border-radius:50% !important; 
        border:1px solid #dad7da;

    }

    /* ------------------------------------ Personalização da Tela Usuário ------------------------------------ */

    .excluir-botao,.editar-botao,.mostrar-botao{

        display: inline-block;
        color: #4a4a4a;
        transition: 0.5s;   

    }

    .botoes-acoes-usuario{

        position: relative;
        justify-content: center;
        display: flex;
        top: 1.6em;
        gap: 30px;

    }

    .excluir-botao:hover{

        transition: 0.5s;
        color: red !important;

    }

    .editar-botao:hover{

        color: #115204;
        transition: 0.5s;

    }

    .mostrar-botao:hover{

        color: #115204;
        transition: 0.5s;

    }


    .borda-status-usuario{

        border-top: 1px solid #DEE2E6;

    }
    
    .table-active .nome-usuario, .table-active .informacoes-usuario{

        font-weight: bold;
        text-decoration: underline !important;

    }


    .table-active .foto-usuario{

        background-color: none !important;
        color: rgba(0, 0, 0, 0.705) !important;

    } 

    #overlay {

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
        top: 50%;
        left: 50%;
        font-size: 50px;
        width: 18em;
        height: 12em;
        box-shadow: 5px 10px #ffcff78a;
        border:5px groove pink;
        border-radius: 10px;
        background-color: rgb(255, 255, 255);
        color:rgb(5, 0, 0);
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        padding: 1em;
        
    }

    .botoes-exclusão{

        display: flex;
        justify-content: center;

    }

    /* ------------------------------------ Personalização da Tela Admin ------------------------------------ */

    .botoes-acoes-admin{

        position: relative;
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-top: 20px;

    }

    .aceitar-botao{

        position: relative;
        top:0.1em;
       

    }

    .botao-confirmar{

        margin-top: 1em;

    }

    #overlay-deletar-admin {

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

    #text-deletar-admin{

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

    #text-deletar-admin p{

        font-size: 20px;

    }
    
    .botao-texto{

        margin-top: 1.5em;
        width: 10em;

    }

    /* ------------------------------------ Texto ------------------------------------ */

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

    .titulo-texto{

        position: relative;
        display: flex;
        margin-bottom: 0.5em;
        gap: 10px;
        color: black;
        text-align: center;

    }

    .texto{

        position: relative;
        display: flex;
        gap: 10px;
        color: black;
        font-size: 20px;
        margin-top: 1em;
        max-height: 1em;

    }

    .comentarios{

        border-top: 2px solid pink;
        font-size: 20px;
        margin-top: 5em;
        width: 40em;
        height: 10em;
        overflow-y: scroll;

    }

    .comentarios h2{

        margin-top: 1em;
        margin-bottom: 1em;

    }

    .foto-usuario-texto{

        position: relative;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 2px solid #4a4a4a93;

    }

    .nome-usuario{

        position: relative;
        left: 3em;
        font-weight: 500;
        margin-bottom: -1.25em;
        color: black;


    }
    
    .nome-usuario-texto{

        position: relative;
        bottom: 2.2em;
        left: 3em;
        color: black;

    }

    .nome-foto-texto{

        border-bottom: 2px solid pink;

    }

    .botao-texto{

        margin-top: 1.5em;
        width: 10em;

    }

    .botao-selecionar-todos{

        padding: 6px;
        border-radius: 7px;
        border: 1px solid #ce3b9d;
        background-color: #ffc0f4;
        font-weight: 500;
        transition: 0.5s;

    }

    .botao-selecionar-todos:hover{

        background-color: #ce3b9d;
        transition: 0.5s;

    }
    
     /* ------------------------------------ Paginação ------------------------------------ */

    .paginacao{

        margin: auto;
        margin-top: 1em;
        padding-right: 13em;
        width: 1%;

    }

    /* -------------------------------------------------------- Ajustamento da Tela -------------------------------------------------------- */
    
    @media (min-width: 7680px) {

        .personalizacao-footer{

            margin-top: 160.1em;

        }

    }

    @media (min-width: 5760px) and (max-width: 7679px) {

        .personalizacao-footer{

            margin-top: 99.9em;

        }

    }

    @media (min-width: 3600px) and (max-width: 4799px) { 

        .personalizacao-footer{

            margin-top: 40em;

        }

    }

    @media (min-width: 1400px) and (max-width: 1599px) {

        .nome-usuario{

            margin-left: 1em;
            margin-top: -1em;

        }

        .nome-foto{

            max-width: 11.5em;

        }

    }
    /* ------------------------------ 150% ------------------------------ */
    @media (min-width: 1200px) and (max-width: 1399px) {

        .nome-usuario{

            max-width: 8em;
            margin-left: -3em;
            margin-top: 3em;

        }

        .foto-usuario{

            margin-left: 2em;

        }

        .nome-foto{

            display: grid;

        }

    }
    /* ------------------------------ 175% ------------------------------ */
    @media (min-width: 1050px) and (max-width: 1199px) { 

        .nome-foto{

            display: grid;
            justify-content: center;
            text-align: center;

        }

        .foto-usuario{

            margin-left: 1.4em;

        }

        .nome-usuario{

            position: relative;
            max-width: 8em; 
            height: max-content;
            margin-top: 3em;
            margin-left: -3.7em;

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
            overflow-x: scroll;

        }

    }

    /* ------------------------------ 200% ------------------------------ */
    @media (min-width: 900px) and (max-width: 1049px) {
        
        tr{

            font-size: 14px;

        }

        .nome-foto{

            display: grid;
            justify-content: center;
            text-align: center;

        }

        .foto-usuario{

            margin-left: 1.3em;

        }
        
        .nome-usuario{

            position: relative;
            max-width: 8em; 
            height: max-content;
            margin-top: 3em;
            margin-left: -3.7em;

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
            overflow-x: scroll;

        }

    }

    /* ------------------------------ 250% ------------------------------ */
    @media (min-width: 750px) and (max-width: 899px) {

        tr{

            font-size: 14px;

        }

         .nome-foto{

            display: grid;
            justify-content: center;
            text-align: center;

        }

        .foto-usuario{

            margin-left: 1.3em;

        }
        
        .nome-usuario{

            position: relative;
            max-width: 8em; 
            height: max-content;
            margin-top: 3em;
            margin-left: -3.7em;

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

    /* ------------------------------ 300% ------------------------------ */
    @media (min-width: 600px) and (max-width: 659px) {

        tr{

            font-size: 12px;

        }

         .nome-foto{

            display: grid;
            justify-content: center;
            text-align: center;

        }

        .foto-usuario{

            margin-left: 0.7em;

        }
        
        .nome-usuario{

            position: relative;
            max-width: 8em; 
            height: max-content;
            margin-top: 3em;
            margin-left: -3.7em;

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

    /* ------------------------------ 400% ------------------------------ */
    @media (min-width: 450px) and (max-width: 539px) {

        tr{

            font-size: 12px;

        }

        .nome-foto{

            display: grid;
            justify-content: center;
            text-align: center;

        }

        .foto-usuario{

            margin-left: 0.7em;

        }

        .nome-usuario{

            position: relative;
            max-width: 8em; 
            height: max-content;
            margin-top: 3em;
            margin-left: -3.7em;

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

            margin-top: -1em;
            margin-left: 1em;

        }

        .titulo-texto{

            font-size: 20px;

        }

        .texto, .comentarios{

            font-size: 14px;

        }

    }

    /* ------------------------------ 500% ------------------------------ */
    @media (min-width: 300px) and (max-width: 449px) {

        tr{

            font-size: 12px;

        }

        .nome-foto{

            display: grid;
            justify-content: center;
            text-align: center;

        }

        .foto-usuario{

            margin-left: 0.7em;

        }

        .nome-usuario{

            position: relative;
            max-width: 8em; 
            height: max-content;
            margin-top: 3em;
            margin-left: -3.7em;

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

            font-size: 10px;

        }

        .botoes-acoes-usuario svg{

            width: 17px;
            height: 17px;

        }

        #text-deletar, #text-deletar-admin{

            top: 50%;
            width: 7.2em;
            height: 3.6em;
            overflow-x: scroll;

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

            margin-top: -0.1em;
            display: grid;

        }

        .botao-cancelar{

            margin-left: -0.1em !important;

        }

        #text{

            width: 6.5em;
            height: 3.5em;
            overflow-x: scroll;

        }

        .nome-foto-texto{

            margin-top: -0.5em;
            height: 2.8em;

        }

        .nome-usuario-texto{

            color: black;
            margin-top: -2em;
            margin-left: 1em;

        }

        .titulo-texto{

            font-size: 20px;

        }

        .texto{

            font-size: 14px;
            max-height: 4em;

        }

        .botoes-solicitacoes button{

            margin-bottom: 1em;

        }

        .comentarios{

            font-size:14px;

        }

    }

</style>

<script>

    function on(solicitacao) {

        const overlay = document.getElementById('overlay');
        const conteudoDiv = document.getElementById('text');

        conteudoDiv.innerHTML = 
        `
            <div class="nome-foto-texto">

                ${solicitacao.user.imagem === null ? `
                    <svg class="foto-usuario-texto" xmlns="http://www.w3.org/2000/svg" fill="#dad7da" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                ` : `

                    <img class="foto-usuario-texto" src="${solicitacao.user.imagem}" />

                `}

                <h1 class="nome-usuario-texto">${solicitacao.user.nome}</h1>

            </div>
            
            <span class="texto">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
                    <path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.7 1.7 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745"/>
                    <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911z"/>
                    <path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0"/>
                </svg>

                ${solicitacao.motivoSolicitacao}

            </span>

            <div class="comentarios">

                <h2>Comentário da Rejeição</h2>

                <span>➤${solicitacao.comentario}</span>

            </div>
        `;

        overlay.style.display = 'block';

    }

    function off() {

        document.getElementById("overlay").style.display = "none";

    }

    function onDeletar() {

        document.getElementById("overlay-deletar").style.display = "block";

    }

    function offDeletar() {

        document.getElementById("overlay-deletar").style.display = "none";

    }

    document.addEventListener('DOMContentLoaded', function() {

        const selecionarTodosBtn = document.getElementById('selecionar-todos');
        const checkBoxes = document.querySelectorAll('input[type="checkbox"][name="id[]"]'); 
        const botaoDeletar = document.getElementById('botao-deletar');

        let tempoAparecerBotaoDeletar;

        function ativarBotaoDeletar() 
        {

            clearTimeout(tempoAparecerBotaoDeletar);

            const anyChecked = Array.from(checkBoxes).some(checkbox => checkbox.checked);

            if (anyChecked) 
            {

                tempoAparecerBotaoDeletar = setTimeout(() => 
                {

                    botaoDeletar.style.display = 'block';

                }, 200);

            } else{

                botaoDeletar.style.display = 'none';

            }

        }

        function selecionarTodos()
        {

            const allSelected = Array.from(checkBoxes).every(checkbox => checkbox.checked); 

            checkBoxes.forEach(checkbox => 
            {

                checkbox.checked = !allSelected; 

            });

            ativarBotaoDeletar();

        }

        selecionarTodosBtn.addEventListener('click', selecionarTodos);

        checkBoxes.forEach(checkbox => 
        {

            checkbox.addEventListener('change', ativarBotaoDeletar);

        });

        ativarBotaoDeletar();

    });

</script>