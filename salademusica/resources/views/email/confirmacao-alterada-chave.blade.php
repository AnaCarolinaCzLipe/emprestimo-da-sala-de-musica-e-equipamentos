<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body style="font-family: 'Inter', sans-serif; display: grid; justify-content: center;">

        @if($solicitacaoChave)

            <div style="max-width:80%;margin:0 auto;color:black;border-radius:10px;background-color:#eeffea!important;border:4px dotted #4a744a;padding:3rem">
    
                <div style="display:grid;">

                    <h1>Solicitação Alterada Confirmada de {{$user->nome}}</h1>

                    <p> 
                    
                        Uma das solicitações alteradas foi confirmada. Fique atento quando {{$user->nome}} vier buscar a chave 🎸⋆⭒˚｡⋆
                    
                    </p>


                </div>

                <div style="margin-bottom: 2em;">

                    <h2>Informações da Solicitação Alterada Confirmada</h2>
    
                    <ul>
    
                        <li style="margin-bottom:1em"><b>Nome:</b> {{$user->nome}}</li>
    
                        <li style="margin-bottom:1em"> <b> Justificativa da Solicitação: </b> {{$solicitacaoChave->texto}} </li>
    
                        <li style="margin-bottom:1em"> <b> Dia e Horário de Empréstimo: </b> Das {{date('H:i',strtotime($solicitacaoChave->horarioEntrada))}} até {{date('H:i',strtotime($solicitacaoChave->horarioEntrega))}} no dia {{date('d/m', strtotime($solicitacaoChave->diaEmprestimo))}} </li>
    
                        <li><b>Status:</b> <span style="background-color:#a1ff98;border:2px solid #55a3529d;padding:5px;border-radius:10px"><b>{{$solicitacaoChave->status}}</b></span></li>
    
                    </ul>

                </div>

                <p> Atenciosamente, Gerenciador da Sala de Música.</p>

                <p style="color:#00000065"> 

                    Clique no botão abaixo para ser direcionado diretamente para o painel de solicitações da chave da sala de música
                
                </p>
                
                <div style="text-align:center;margin-bottom:2em">

                    <form action="{{ url('/empréstimo-chave-sala-de-música/status') }}">

                        <button style="border:none;color:white;font-size:16px;background-color:#57cf5d;padding:0.62rem;border-radius:5px" url="{{route('emprestimochave.index')}}">Verificar Solicitação</button>
                    
                    </form>
                    
                </div>

            </div>

        @endif
        
    </body>

</html>