<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body style="font-family: 'Inter', sans-serif; display: grid; justify-content: center;">

        @if($solicitacao)

            <div style="max-width:80%;margin:0 auto;color:black;border-radius:10px;background-color:#ecffea!important;border:4px dotted #4b744a;padding:3rem">
    
                <div style="display:grid;">

                    <h1>Solicitação Confirmada de {{$user->nome}}</h1>

                    <p>

                        Uma de suas solicitações feitas para pedir equipamento(s) emprestado(s) foi confirmada! Por favor, verifique o dia e os horários 
                        certos de sua solicitação para poder ir ao local pegar o(s) equipamento(s), e atente-se ao prazo para devolve-lo(s)! 🎸⋆⭒˚｡⋆

                    </p>

                    <div style="display:grid;color:rgb(136,49,49)">

                        <p>

                            ⚠︎  Lembrando que, o equipamento após a usagem, deverá ser devolvido na sala de música, os equipamentos não podem sair da escola.

                        </p>

                        <p>

                            ⚠︎  Não é permitido danificar quaisquer equipamentos.

                        </p>

                    </div>

                    <p>

                        ╰┈➤ Em caso de dúvidas entre em contato com nosso email, reserva.sala.musica@gmail.com, para que possamos lhe ajudar. 🙂

                    </p>

                </div>

                <div style="text-align:center;padding:20px">

                    <p style="background-color:rgb(247,62,62); border-radius:10px; padding:10px; font-weight:bold; border:2px solid red; margin:0 auto">
                        
                        A devolução tem que ser feita de acordo com os horários selecionados, por isso se atente e não se esqueça, pois dependendo da situação em que o(s)
                        equipamento(s) não foi devolvido corretamente, pode haver uma <u>penalização</u> selecionada pelos administradores do site.
                            
                    </p>

                </div>

                <div>

                    <h2>Informações da Solicitação Confirmada</h2>
    
                    <ul>
    
                        <li style="margin-bottom:1em"><b>Nome:</b> {{$user->nome}}</li>
    
                        <li style="margin-bottom:1em"> <b> Justificativa da Solicitação: </b> {{$solicitacao->texto}} </li>
    
                        <li style="margin-bottom:1em"> <b> Dia e Horário de Empréstimo: </b> Das {{date('H:i',strtotime($solicitacao->horarioEntrada))}} até {{date('H:i',strtotime($solicitacao->horarioEntrega))}} no dia {{date('d/m', strtotime($solicitacao->diaEmprestimo))}} </li>
    
                        <li style="margin-bottom:1em"> <b> Equipamentos: </b>
                        
                            @foreach($equipamentosSelecionados as $equipamento)

                                {{ $equipamento }}

                            @endforeach
                            
                        </li>

                        <li><b>Status:</b> <span style="margin-bottom:1em; background-color:#aaff98;border:2px solid #59a3529d;padding:5px;border-radius:10px"><b>{{$solicitacao->status}}</b></span></li>
    
                    </ul>

                </div>

                <p> Atenciosamente, Gerenciador da Sala de Música.</p>

                <p style="color:#00000065"> 

                    Clique no botão abaixo para ser direcionado diretamente para o painel de solicitações da chave da sala de música
                
                </p>
                
                <div style="text-align:center;margin-bottom:2em">

                    <form action="{{ url('/empréstimo-equipamento-sala-de-música/status') }}">

                        <button style="border:none;color:white;font-size:16px;background-color:#7aba78;padding:0.62rem;border-radius:5px" url="{{route('emprestimochave.index')}}">Verificar Solicitação</button>
                    
                    </form>
                    
                </div>

            </div>

        @endif
        
    </body>

</html>