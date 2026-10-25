<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body style="font-family: 'Inter', sans-serif; display: grid; justify-content: center;">

        @if($solicitacaoChave)

            <div style="max-width:80%;margin:0 auto;color:black;border-radius:10px;background-color:#ecffea!important;border:4px dotted #4b744a;padding:3rem">
    
                <div style="display:grid;">

                    <h1>Solicitação Confirmada de {{$user->nome}}</h1>

                    <p>

                        Uma de suas solicitações feitas para pedir a chave da sala de música emprestada foi confirmada! Por favor, verifique o dia e os horários 
                        certos de sua solicitação para poder ir ao local pegar a chave, e atente-se ao prazo para devolver a chave! 🎸⋆⭒˚｡⋆

                    </p>

                    <div style="display:grid;color:rgb(136,49,49)">

                        <p>

                            ⚠︎ Lembrando que, uma pessoa pode estar com a chave antes que você, e que existe uma possibilidade da pessoa não entregar no horário 
                            certo e ter atrasos, caso isso aconteça, contate a Direção de Ensino para fornecer alterações para sua solicitação.

                        </p>

                        <p>

                            ⚠︎ Caso for pegar a chave diretamente com a pessoa, avise a Direção de Ensino antes de pegar.

                        </p>

                    </div>

                    <p>

                        ╰┈➤ Em caso de dúvidas entre em contato com nosso email, reserva.sala.musica@gmail.com, para que possamos lhe ajudar. 🙂

                    </p>

                    <p>

                        ╰┈➤ A chave normalmente fica com o pessoal da Direção de Ensino, localizado no térreo, ao final do corredor perto da porta para o refeitório.

                    </p>

                </div>

                <div style="text-align:center;padding:20px">

                    <p style="background-color:rgb(247,62,62); border-radius:10px; padding:10px; font-weight:bold; border:2px solid red; margin:0 auto">
                        
                        Mais uma vez, se atente as datas que <u>você</u> colocou na hora de fazer a solicitação, pois, caso a solicitação passe da data
                        limite, pode ser aplicada uma <u>penalização</u> dependendo de sua situação.
                            
                    </p>

                </div>

                <div>

                    <h2>Informações da Solicitação Confirmada</h2>
    
                    <ul>
    
                        <li style="margin-bottom:1em"><b>Nome:</b> {{$user->nome}}</li>
    
                        <li style="margin-bottom:1em"> <b> Justificativa da Solicitação: </b> {{$solicitacaoChave->texto}} </li>
    
                        <li style="margin-bottom:1em"> <b> Dia e Horário de Empréstimo: </b> Das {{date('H:i',strtotime($solicitacaoChave->horarioEntrada))}} até {{date('H:i',strtotime($solicitacaoChave->horarioEntrega))}} no dia {{date('d/m', strtotime($solicitacaoChave->diaEmprestimo))}} </li>
    
                        <li><b>Status:</b> <span style="background-color:#aaff98;border:2px solid #59a3529d;padding:5px;border-radius:10px"><b>{{$solicitacaoChave->status}}</b></span></li>
    
                    </ul>

                </div>

                <p> Atenciosamente, Gerenciador da Sala de Música.</p>

                <p style="color:#00000065"> 

                    Clique no botão abaixo para ser direcionado diretamente para o painel de solicitações da chave da sala de música
                
                </p>
                
                <div style="text-align:center;margin-bottom:2em">

                    <form action="{{ url('/empréstimo-chave-sala-de-música/status') }}">

                        <button style="border:none;color:white;font-size:16px;background-color:#7aba78;padding:0.62rem;border-radius:5px" url="{{route('emprestimochave.index')}}">Verificar Solicitação</button>
                    
                    </form>
                    
                </div>

            </div>

        @endif
        
    </body>

</html>