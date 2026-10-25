<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

	<header>

        <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

        <title>Ajuda</title>
    
	</header>

	<body>

        <div class="container">

            <div class="row">

                <aside id="aside-content" class="itens-buscar col-md-3">

                    <div style="background-color: #c4ecc4; padding:10px; margin-top: 2em; border-radius: 10px; border:2px solid #a6d5a6;">

                        <h2>Índice</h2>

                        <ul class="list-group">

                            <li class="list-group-item"><a href="#section1">1. Login e Cadastro</a></li>
                            <li class="list-group-item"><a href="#section2">2. Reserva sala de música e equipamentos</a></li>
                            <li class="list-group-item"><a href="#section3">3. Penalizações</a></li>
                            <li class="list-group-item"><a href="#section4">4. Grupos</a></li>

                        </ul>

                    </div>

                </aside>

                <button id="toggle-aside" class="botao-mostrar-indice">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5M8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6"/>
                    </svg>
    
                </button>

                <div class="container-informacoes-ajuda col-md-9 mx-auto">

                    <div class="introducao">

                        <div class="left">
                         
                             <h2>Seja Bem-vindo</h2>
                        
                            <p>

                                Aqui daremos o suporte para caso tenha alguma dúvida.   

                            </p>
                       
                        </div>
                        
                        <div class="right">
                    
                            <h2>Mas antes de tudo, você sabe para que serve o site?</h2>
                        
                            <p>
                                ➥ O site é um sistema que faz controle de quem precisa 
                                fazer uma solicitação para utilizar a sala de música ou empréstimos 
                                de equipamentos. Com isso, o programa tem objetivo de facilitar o 
                                trabalho do responsável desses dois quesitos.
                            </p>

                        </div>

                    </div>

                    <section id="section1">

                        <div class="filha-reserva">

                            <h2 style="margin-bottom: 1em;">1. Login e cadastro</h2>

                            <p>

                                ➥ No cadastro será onde você irá inserir os dados solicitados, um email será enviado para confirmar seu cadastro, confirmando
                                você poderá navegar pelo site normalmente.
                                
                            </p>

                            <div class="filha2-login">

                                <img src="../assets/images/verificar-email.png"/>

                            </div>

                            <p>

                                ➥ Em casos de não lembrar a senha, ao clicar no "Esqueceu a sua senha?", deverá ser inserido o seu email para poder mandar um email trocar a senha.

                            </p>

                            <div class="filha2-login">

                                <img src="../assets/images/login.png"/>

                            </div>

                            <div class="filha2-login">

                                <img src="../assets/images/esqueci.png"/>

                            </div>

                            <p>

                                ➥ Se ocorrer de o email não chegar ao usuário não importando o que tente, recomendamos que mande um email para "reserva.sala.musica@gmail.com".

                            </P>
                            
                        </div>

                    </section>

                    <section id="section2">

                        <div class="div-reserva-pendente">

                            <div>

                                <h2>2. Reserva sala de música e equipamentos</h2>

                                <p>

                                    ➥ Quando entrar na página de reserva, o usuário poderá ver os dados já agendados e assim terá possibilidade de pedir uma solicitação.
                                    No momento salvo, ele estará armazenado em pendente, enquanto estiver neste status conseguirá editar, ver e deletar. Mas na hora 
                                    que estiver confirmada, não terá mais essas condições. 
                                
                                </p>

                                <div class="filha2-reserva-pendente">
                                
                                    <img src="../assets/images/pendente.png" />
                                    
                                </div>

                            </div>

                            <div>

                                <h3 class="cabecalho" style="margin-bottom: 1em;"> 2.1 Confirmada</h3>
                                
                                <div class="div-reserva-confirmado">
                                                                
                                    <p>

                                        ➥ Neste tempo será enviado um email confirmando a sua solicitação, o status confirmado só irá aparecer na reserva da sala de música.
                                        O status quer dizer que, a chave ainda não estará em sua posse, só a solicitação que vai ser 
                                        colocada como confirmada, que significa que algum administrador aceitou a solicitação, então você pode ir buscar a chave. 
                                        Caso você não busque a chave no dia e horários que solicitou, a solicitação será apagada.
                                                    
                                    </p>

                                    <div class="filha2-reserva-confirmado">
                                    
                                        <img src="../assets/images/confirmado.png" />
                                    
                                    </div>

                                </div>

                            </div>

                            <div>

                                <h3 class="cabecalho" style="margin-bottom: 1em;"> 2.2 Em Posse</h3>
                                
                                <div class="div-reserva-confirmado">
                                                                
                                    <p>

                                        ➥ Quando a solicitação estiver em posse, a pessoa que fez a solicitação está com a chave ou equipamento atualmente, 
                                        se atente aos horários de término da solicitação da pessoa, pois caso a sua solicitação esteja mais próxima do dia e 
                                        dos horários da pessoa, será sua vez de buscar a chave ou o(s) equipamento(s) solicitados.
                                                    
                                    </p>

                                    <div class="filha2-reserva-confirmado">
                                    
                                        <img src="../assets/images/em posse.png" />
                                    
                                    </div>

                                </div>

                            </div>

                            <div>
                            
                                <h2 class="cabecalho"> 2.3 Alterada </h3>
                            
                                <div class="filha-reserva-recusado">
                                
                                    <p>

                                        ➥ A solicitação pode ser alterada em algumas ocasiões, caso isso ocorra, será enviado um email junto 
                                        a um comentário, que demonstrará o motivo de ter sido alterada. Se você concordar com a alteração, só
                                        clicar na carinha feliz que vai aparecer do lado, e a solicitação será considerada como <span style="color: green">confirmada</span>,
                                        caso contrário, se você não concorda devido a algum motivo, só clicar na carinha triste do lado, e a solicitação vai ser marcada
                                        como <span style="color: red">rejeitada</span>.

                                                   
                                    </p>

                                </div>

                                <div class="filha2-reserva-recusado">

                                    <img src="../assets/images/alterado.png" />
                                    
                                </div>

                            </div>

                            <div>
                            
                                <h2 class="cabecalho"> 2.4 Rejeitada </h2>
                            
                                <div class="filha-reserva-recusado">
                                
                                    <p>

                                        ➥ Caso sua solicitação seja rejeitada, ela será <span style="color: red">rejeitada permanentemente</span>, e será enviado um email avisando que foi
                                        e terá um comentário de um dos adminstradores explicando o motivo de isso ter acontecido com a sua solicitação.
                                                   
                                    </p>

                                </div>

                                <div class="filha2-reserva-recusado">

                                    <img src="../assets/images/rejeitado.png" />
                                    
                                </div>

                            </div>

                            <div>
                            
                                <h2 class="cabecalho"> 2.5 Alterada Rejeitada </h2>
                            
                                <div class="filha-reserva-recusado">
                                
                                    <p>

                                        ➥ Sua solicitação também pode ser contada como "Alterada Rejeitada", isso ocorre somente quando uma de suas solicitações são
                                        alteradas, e você não concorda com a alteração, e então, ela consta com esse status para ter uma diferença da <span style="color: red">rejeitada</span>, que acontece 
                                        quando os admins rejeitam sua solicitação.
                                                   
                                    </p>

                                </div>

                                <div class="filha2-reserva-recusado">

                                    <img src="../assets/images/alterada-rejeitada.png" />
                                    
                                </div>

                            </div>

                        </div>

                    </section>
                    
                    <section id="section3">

                        <div class="div-bandas">

                            <h2 class="cabecalho"> 3. Penalizações  </h2>
                         
                            <p>

                                ➥ Caso o usuário atrase, não devolva a chave da sala de música ou o(s) equipamento(s) reservados, ele será penalizado pelo
                                administrador, onde ele vai estabelecer uma penalização de pelo menos <span style="color: green;">1 dia</span>, ou em
                                casos piores, uma penalização de até <span style="color: red">1 mês</span>, e consequentemente, 
                                ficará impedido de realizar qualquer empréstimo durante esse período. Caso o usuário já tenha feito outras solicitações antes
                                de ser penalizado, suas solicitações seram <b>anuladas</b>.
                                                   
                            </p>
                                
                            <div class="filha2-reserva-recusado">

                                <img src="../assets/images/multa.jpeg" />

                            </div>

                        </div>

                    </section>

                    <section id="section4">

                        <div>

                            <h2 class="cabecalho" style="margin-bottom: 1em;">4. Grupos </h2>
                                
                            <p>
                                    
                                ➥ A página de grupos serve para exibição dos grupos do IFPR, a fim divulgar os participantes e as músicas que tocam, 
                                além de compartilhar caso precisem de algum integrante novo. Se você gostaria integrar sua banda 
                                no sistema é so conversar com algum administrador do site (Exemplo: falar com a professora Isis de Artes), 
                                dar informações sobre a sua banda (nome, informação sobre sua grupo, horários de ensaio [opcional] e sobre os integrantes do grupo) 
                                                
                            </p>
                                
                            <div class="filha2-banda">

                                <img src="../assets/images/bandas.jpeg" width='600px' height ="400px"/>

                            </div>

                        </div>
                        
                    </section>

                </div>

            </div>

        </div>

        @include('footer.footer')

	</body>

</x-app-layout>	

<style>

    *{

        text-decoration: none !important;

    }

    .main{

        background-color: #e8faea;

    }

    .introducao{
         
        display: flex;
        width: 100%;
        border-bottom: 2px solid #a6d5a6;
        padding-bottom: 5em;
         
    }

    .left {
        
        text-align: center;
        width:50%;
        float:left;
        margin-top:5em;
        margin-right:10px;

    }
        
    .right{

        background-color: #a6d5a6;
        width:50%;
        padding: 20px;
        float: right;
        margin-top:2em;
        margin-right:10px;
        right:5px;
        border-radius: 10px;
         
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

    .filha2-login, .filha2-banda, .filha2-reserva-recusado, .filha2-reserva-confirmado, .filha2-reserva-pendente{

        display: grid;
        margin-top: 2em;
        margin-bottom: 2em;
        justify-content: center;
        gap: 60px;

    }

    .filha2-login img, .filha2-banda img, .filha2-reserva-recusado img, .filha2-reserva-confirmado img, .filha2-reserva-pendente img{

        border-radius: 10px;
        border: 2px solid #a6d5a6;

    }

    .container-informacoes-ajuda{

        margin-left: 2em !important;
        display: grid;

    }

    .itens-buscar{

        width: 25em;
        margin-left: -17em;
        border-right: 2px solid #a6d5a6;

    }
    
    #section1, #section2, #section3{

        text-align: center;
        margin-top: 2em;
        padding-bottom: 5em;
        width: 85em;
        border-bottom: 2px solid #a6d5a6;

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
        border: 2px solid #a6d5a6;
        padding: 10px;
        transition: 0.5s;

    }

    .list-group-item:hover{

        background-color: #22ff5293;
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

            margin-left: -6em;
            width: 24em;

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

            margin-left: -6em;
            width: 52em;

        }  

        .botao-mostrar-indice{

            position: absolute;
            width: min-content;
            display: flex;
            justify-content: center;
            padding: 5px;
            margin-left: -6em;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: rgb(159, 223, 159);

        }

        .itens-buscar{

            margin-left: -7em;
            width: 58em;
            max-width: 58em;
            border: none;
            border-bottom: 2px solid #a6d5a6;
            padding-bottom: 5em;

        }

    }

    @media (min-width: 750px) and (max-width: 899px) {

        .introducao, #section1, #section2, #section3, #section4{

            margin-left: -3em;
            width: 43em;

        }  

        .botao-mostrar-indice{

            position: absolute;
            width: min-content;
            display: flex;
            justify-content: center;
            padding: 5px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: rgb(159, 223, 159);

        }

        .itens-buscar{

            margin-left: -0.9em;
            width: 47em;
            max-width: 47em;
            border: none;
            border-bottom: 2px solid #a6d5a6;
            padding-bottom: 5em;

        }

    }

    @media (min-width: 600px) and (max-width: 659px) {

        .introducao, #section1, #section2, #section3, #section4{

            margin-left: -2em;
            width: 32em;

        }  

        .botao-mostrar-indice{

            position: absolute;
            width: min-content;
            padding: 5px;
            margin-left: -2.5em;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            background-color: rgb(159, 223, 159);

        }

        .itens-buscar{

            margin-left: -3em;
            width: 39em;
            max-width: 39em;
            border: none;
            border-bottom: 2px solid #a6d5a6;
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
            background-color: rgb(159, 223, 159);

        }

        .itens-buscar{

            margin-left: -0.1em;
            width: 28em;
            max-width: 28em;
            border: none;
            border-bottom: 2px solid #a6d5a6;
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
            background-color: rgb(159, 223, 159);

        }

        .itens-buscar{

            margin-left: 1em;
            width: 22em;
            max-width: 22em;
            border: none;
            border-bottom: 2px solid #a6d5a6;
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