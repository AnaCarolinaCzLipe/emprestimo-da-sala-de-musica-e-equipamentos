<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

	<header>

        <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
        <title>Manual do Administrador</title>
    
	</header>

	<body>

        <div class="container">

            <div class="row">

                <aside id="aside-content" class="itens-buscar col-md-3">

                    <div style="background-color: #ffb9ee; padding:10px; margin-top: 2em; border-radius: 10px; border:2px solid #d35c958f;">

                        <h2>Índice</h2>

                        <ul class="list-group">

                            <li class="list-group-item"><a href="#section1">1. Gerenciamento da Reserva de Música e Equipamentos</a></li>
                            <li class="list-group-item"><a href="#section2">2. Controle dos Equipamentos</a></li>
                            <li class="list-group-item"><a href="#section3">3. Gerenciamento dos Grupos</a></li>
                            <li class="list-group-item"><a href="#section4">4. Penalizações</a></li>

                        </ul>

                    </div>

                </aside>

                <button id="toggle-aside" class="botao-mostrar-indice">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5M8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6"/>
                    </svg>
    
                </button>

                <div class="container-informacoes-ajuda col-md-9 mx-auto">

                    <section id="section1">

                        <div class="div-reserva">

                            <div class="filha-reserva">

                                <h2>1. Gerenciamento da Reserva de Música e Equipamentos</h2>

                                <p>

                                    ➥ O administrador verá as solicitações feitas pelos usuários e assim caberá a ele se a partir dos dados elas serão 
                                    confirmadas ou não. Se sim é só clicar na seta verde que automaticamente mudará o status da solicitação para <span style="color: rgb(5, 190, 5);">“Confirmado”</span>
                                    e será enviado um email avisando da aprovação da solicitação para que o usuário busque a chave da sala ou os equipamentos, após o usuário buscar a chave
                                    sua solicitação deve ser mudada para <span style="color: green;">"Em Posse"</span>, para que outras pessoas consigam ver com quem está a chave atualmente. Após a usagem da chave, confirme depois
                                    que o usuário terminou de usar a sala, e confirme outra pessoa para usar a chave.
                                    
                                </p>
                                    
                                <p>
                                    ➥ As solicitações também podem ser marcadas como <span style="color:red;">"Rejeitada"</span>, ao clicar no <span style="color:red;">"X"</span>, você deverá mostrar o
                                    motivo de não ter sido confirmada para o usuário, onde a mensagem será mandada pelo email do usuário. A solicitação não será apagada,
                                    ficará nas "Solicitações Recusadas" para que caso ocorra alguma coisa sobre a solicitação, mas caso tenha muitas solicitações, elas
                                    podem ser facilmente apagadas em conjuntos ou sozinhas.
                                
                                </p>

                                <p>
                                
                                    ➥ Elas também podem ser <span style="color: rgb(155, 155, 7);">alteradas</span> caso ocorra alguma confusão referente aos horários de uma solicitação com a outra, cabe só ao
                                    usuário aceitar a solicitação depois, mas ela também pode ser rejeitada pelo próprio usuário, caso não lhe agrade a alteração.
    
                                </p>

                                <div class="filha2-reserva">
    
                                    <img src="../assets/images/emprestimoequipamento.png" width='1000px' height ="700px"/>
    
                                    <img src="../assets/images/GerenciamentoSolicitacoes.png" width='1000px' height ="700px"/>
    
                                </div>	

                            </div>
                            
                            <div class="2-filha-reserva">
                              
                                <p style="font-weight: 500; text-decoration: 2px underline #c55d90 !important;">➤ E aqui ficará a página de visualização das solicitações rejeitadas</p>
    
                                <div class="filha2-reserva">

                                    <img src="../assets/images/solicitacoesrecusadasequipamento.png" width='1000px' height ="700px"/>

                                    <img src="../assets/images/solicitacoesrecusadaschave.png" width='1000px' height ="700px"/>

                                </div>
                                
                            </div>

                        </div>

                    </section>

                    <section id="section2">

                        <div class="div-reserva-pendente">

                            <h2>2. Controle dos Equipamentos</h2>

                            <p>

                                ➥ Caberá ao administrador gerenciar os equipamentos liberados para a reserva criando, editando e quando 
                                necessário excluindo. Nele pedirá o nome e as características (as características valem para todos os equipamentos, não só apenas um, então considere
                                colocar a característica de geral) apenas.
                            
                            </p>

                            <div class="filha2-equipamento">
                
                                <img src="../assets/images/equipamentos.png" width='1000px' height ="700px"/>
                                
                            </div>

                        </div>

                    </section>
                    
                    <section id="section3">

                        <div class="div-bandas">

                            <h2>3. Gerenciamento dos Grupos</h2>

                            <p>

                                ➥ Aqui ocorrerá a administração dos grupos que será exibida para o usuário a fim de compartilhar no 
                                ambiente escolar. Assim o administrador deverá adicionar os grupos no sistema colocando os dados 
                                fornecidos. Se precisar apagar algum grupo, aparecerá um botão 
                                perguntando se quer mesmo apaga-lo, ou se quiser editar, pode editar o grupo, mas deverá fornecer as imagens novamente.
                            
                            </p>

                            <div class="filha2-bandas">
                
                                <img src="../assets/images/criacaoBandas.jpeg"  width='600px' height ="300px"/>
                            
                            </div>

                        </div>

                    </section>

                    <section id="section4">

                        <div class="div-multa">

                            <h2>4. Penalizações</h2>

                            <p>

                                ➥ Os administradores devem ficar de olho nas solicitações dos usuários, tanto na reserva da sala quanto de equipamentos. 
                                Caso o usuário não as respeite ou se atrase, o administrador terá o direito de aplicar uma penalização de no mínimo <span style="color: green;">1 dia</span>, 
                                e no máximo <span style="color: red;">1 mês</span>. Se o administrador reconsiderar a multa estabelecida, poderá retirá-la.
                            
                            </p>

                            <div class="filha2-multa">
                
                                <img src="../assets/images/penalizacao.png"  width='600px' height ="300px"/>

                                <img src="../assets/images/remover multa.jpeg"  width='600px' height ="300px"/>  
                            
                            </div>

                        </div>

                    </section>

                </div>

            </div>

        </div>

	</body>

    @include('footer.footer')

</x-app-layout>	

<style>

    *{

        text-decoration: none !important;

    }

    .main{

        background-color: #fae8ef;

    }

    .heranca{
         
        display: flex;
        width: 100%;
         
    }

    .left {
        
        text-align: center;
        width:50%;
        float:left;
        margin-top:10px;
        margin-right:10px;

    }
        
    .right{

        background-color: #d5a6bd;
        width:50%;
        padding: 20px;
        float: right;
        margin-top:10px;
        margin-right:10px;
        right:5px;
         
    }
    
    .div-reserva, .div-reserva-pendente,.div-reserva-confirmado,.div-reserva-recusado, .div-bandas, .div-multa{
         
        width: 100%;
        display:flex;
        flex-direction:column;
        justify-content: center;
        align-items: center;
 
    }   
    
    .div-reserva h2, .div-reserva-pendente h2,.div-reserva-confirmado h2,.div-reserva-recusado h2, .div-bandas h2, .div-multa h2{

        margin-bottom: 1em;

    }
        
    .cabecalho{
        
        text-align: center;

    }
        
    h2{

        margin: 10px;
        
    }

    .right p {

        margin: 0;
        line-height: 1.6;

    }

    .filha2-bandas, .filha2-reserva, .filha2-multa, .filha2-multa, .filha2-equipamento{

        display: grid;
        margin-top: 2em;
        margin-bottom: 2em;
        justify-content: center;
        gap: 60px;

    }

    .filha2-bandas img, .filha2-reserva img, .filha2-multa img, .filha2-multa img, .filha2-equipamento img{

        border-radius: 10px;
        border: 2px solid #d5a6bd;

    }
    .container-informacoes-ajuda{

        margin-left: 2em !important;
        display: grid;

    }

    .itens-buscar{

        width: 25em;
        margin-left: -17.5em;
        border-right: 2px solid #d5a6bd;

    }
    
    #section1, #section2, #section3{

        text-align: center;
        margin-top: 2em;
        padding-bottom: 5em;
        width: 85em;
        border-bottom: 2px solid #d5a6bd;

    }

    #section4{

        text-align: center;
        margin-top: 2em;
        padding-bottom: 5em;
        width: 85em;

    }

    .list-group{

        margin-bottom: 1em;

    }

    .list-group-item{

        background-color: transparent;
        border: 2px solid #d35c958f;
        padding: 10px;
        transition: 0.5s;

    }

    .list-group-item:hover{

        background-color: #ff22ed93;
        transition: 0.5s;

    }

    .list-group-item a {

        text-decoration: none;
        color: #000;

    }
    .list-group-item a:hover {

        text-decoration: underline;

    }

    @media (min-width: 1600px) and (max-width: 1799px) {
        
        .itens-buscar{

            margin-left: -12em;

        }
        
        .introducao, #section1, #section2, #section3, #section4{

            width: 75em;

        }

    }

    @media (min-width: 1400px) and (max-width: 1599px) {

        .itens-buscar{

            width: 24em;
            margin-left: -6em;

        }
        
        .introducao, #section1, #section2, #section3, #section4{

            width: 65em;

        }

    }

    @media (min-width: 1200px) and (max-width: 1499px) {

        .itens-buscar{

            width: 19em;
            margin-left: -3.8em;

        }
        
        .introducao, #section1, #section2, #section3, #section4{

            width: 55em;

        }

    }

    @media (min-width: 1050px) and (max-width: 1199px) {

        .itens-buscar{

            width: 16em;
            margin-left: -3.8em;

        }
        
        .introducao, #section1, #section2, #section3, #section4{

            width: 48em;

        }  

    }

    @media (min-width: 900px) and (max-width: 1049px) {

        .introducao, #section1, #section2, #section3, #section4{

            margin-left: -6.5em;
            width: 52em;

        }  

        .botao-mostrar-indice{

            position: absolute;
            width: min-content;
            padding: 5px;
            margin-left: -6.6em;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: #df9fda;

        }

        .itens-buscar{

            margin-left: -7em;
            width: 58em;
            max-width: 58em;
            border: none;
            border-bottom: 2px solid #d35c958f;
            padding-bottom: 5em;

        }

    }

    @media (min-width: 750px) and (max-width: 899px) {

        .introducao, #section1, #section2, #section3, #section4{

            margin-left: -1em;
            width: 42em;

        }  

        .botao-mostrar-indice{

            position: absolute;
            width: min-content;
            padding: 5px;
            margin-left: -0.5em;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: #df9fda;

        }

        .itens-buscar{

            margin-left: -1em;
            width: 47em;
            max-width: 47em;
            border: none;
            border-bottom: 2px solid #d35c958f;
            padding-bottom: 5em;

        }

    }

    @media (min-width: 600px) and (max-width: 659px) {

        .introducao, #section1, #section2, #section3, #section4{

            margin-left: -3.6em;
            width: 35em;

        }  

        .botao-mostrar-indice{

            position: absolute;
            width: min-content;
            padding: 5px;
            margin-left: -2.4em;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: #df9fda;

        }

        .itens-buscar{

            margin-left: -3em;
            width: 39em;
            max-width: 39em;
            border: none;
            border-bottom: 2px solid #d35c958f;
            padding-bottom: 5em;

        }

    }
    
    @media (min-width: 450px) and (max-width: 539px) {

        .row{

            width: 10em;

        }

        .introducao, #section1, #section2, #section3, #section4{

            margin-left: -1.5em;
            width: 27em;
            display: grid;

        }  

        .introducao .right{

            margin-left: -0.2em;
            width: 27em;

        }

        .introducao .left{

            margin-top: -0.1em;
            margin-left: 3.5em;
            width: 20em;

        }

        .botao-mostrar-indice{

            position: absolute;
            width: min-content;
            padding: 5px;
            margin-left: -0.1em;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: #df9fda;

        }

        .itens-buscar{

            margin-left: -0.1em;
            width: 28.5em;
            max-width: 28.5em;
            border: none;
            border-bottom: 2px solid #d35c958f;
            padding-bottom: 5em;

        }

    }
    
    @media (min-width: 300px) and (max-width: 449px) {

        .row{

            width: 10em;

        }

        .introducao, #section1, #section2, #section3, #section4{

            margin-left: 0.5em;
            width: 20em;
            display: grid;

        }  

        .introducao .right{

            margin-left: -0.2em;
            width: 20em;

        }

        .introducao .left{

            margin-top: -0.1em;
            margin-left: -0.1em;
            width: 20em;

        }

        .botao-mostrar-indice{

            position: absolute;
            width: min-content;
            padding: 5px;
            margin-left: 0.1em;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: #df9fda;

        }

        .itens-buscar{

            margin-left: 1em;
            width: 22.5em;
            max-width: 22.5em;
            border: none;
            border-bottom: 2px solid #d35c958f;
            padding-bottom: 5em;

        }

    }
    
</style>

<script>

    function detectZoom() 
    {

        return Math.round(window.devicePixelRatio * 100);

    }

    function toggleAsideDisplay() 
    {

        var zoomLevel = detectZoom();

        if (zoomLevel >= 200 && zoomLevel <= 500) 
        {
            $("#aside-content").hide();
            $("#toggle-aside").show();
        } else {
            $("#aside-content").show();
            $("#toggle-aside").hide();
        }

    }

    $(document).ready(function(){
        toggleAsideDisplay();
        $("#toggle-aside").click(function(){
            $("#aside-content").slideToggle();
        });
        $(window).resize(function() {
            toggleAsideDisplay();
        });
    });

</script>