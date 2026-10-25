<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>

    <body style="font-family: 'Inter', sans-serif; display: grid; justify-content: center;">

        @if($solicitacaoChave)

            <div style="max-width:80%; margin:0 auto; color:black; border-radius:10px; background-color:rgb(255, 234, 234) !important; border:4px dotted #744a4a; padding:3rem">
                
                <div class="informativo">

                    <h2>Notificação de uma Solicitação Rejeitada de {{$user->nome}}.</h2>

                    <p>Ops. Aparentemente sua solicitação foi rejeitada. 🎸... 💧 💧</p>

                    <p>Alguém deixou um comentário em sua solicitação:</p>

                    <div style="display:grid;">

                        <div>

                            <h3>Comentários:</h3>

                            <p>{{$solicitacaoChave->comentario}}</p>

                        </div>

                        <div style="text-align: center;">

                            <p>

                                <pre style="font-family:monospace">
                                ⠀⠀⠀⠀⣀⡤⠤⣤⣤⡤⠤⠒⢤⣤⣤⣀⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                                ⠀⠀⢠⡶⢋⣝⣾⠁⠀⠀⠀⣿⣿⣿⣿⣿⣦⡀⠀⠀⠀⠀⠀⠀⠀⠀
                                ⠀⠀⠀⣴⠋⢺⠏⠛⠆⠀⢈⣿⣿⣿⣿⣿⣿⣿⡀⠀⠀⠀⠀⠀⠀⠀
                                ⠀⠀⠀⢀⣴⠟⡀⠀⠀⠀⠀⢿⣿⣿⣿⣿⣿⣿⡇⠀⠀⠀⠀⠀⠀⠀
                                ⠀⢀⣴⠟⠁⠀⠙⠭⠉⠀⠀⠈⢿⣿⣿⣿⣿⣿⠃⠀⠀⠀⠀⠀⠀⠀
                                ⢀⡾⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⢛⡿⠛⠁⠀⠀⠀⠀⠀⠀⠀⠀
                                ⠠⡇⠀⠀⠀⠀⠀⠀⠀⠀⢀⣄⡀⠀⢘⣧⣀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                                ⠐⣧⠀⠀⠀⠀⠀⠀⠀⣠⠟⠋⠉⢻⣏⠀⢉⠛⠲⣤⡀⠀⠀⠀⠀⠀
                                ⠀⢿⣿⣷⠆⠀⠰⠒⠋⠁⠀⠀⠀⣸⣏⡇⠘⡆⠀⢀⣷⡄⠀⠀⠀⠀
                                ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣿⡇⡏⠀⢣⠀⠸⣿⣿⠀⠀⠀⠀
                                ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣸⢿⡆⢱⠀⠈⢒⡆⠈⣽⠃⠀⠀⠀
                                ⠀⠀⠀⠀⠀⠀⠀⠀⣀⣸⣧⢾⣽⣾⡀⡾⣝⣡⡴⣿⣶⡒⢶⡀
                                ⠀⠀⠀⠀⠀⠀⠀⢸⣥⠈⠉⠻⠋⠀⡽⠋⠉⠉⢲⡍⠉⠁⣸⠄
                                ⠀⠀⠀⠀⠀⠀⠀⠈⠳⣏⠀⠀⠀⠀⣇⠀⢀⠖⢉⠤⣄⣴⠋⠀
                                ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠙⠒⠂⠤⠚⠀⠈⠒⠚⠚⠉⠀⠀⠀
                                </pre>

                            </p>

                        </div>

                    </div>

                    <div style="text-align: center; margin-bottom: 2em;">

                        <p style="margin-bottom: 2em;">

                            ➤ Você acha que sua solicitação está normal? Entre em contato com o nosso email reserva.sala.musica@gmail.com. 
                            Ou contate algum responsável da sala de música.
                        
                        </p>

                    </div>

                </div>

                <div style="border-top: 2px solid #00000062; border-bottom: 2px solid #00000062;">

                    <h2>Informações de sua solicitação</h2>

                    <div style="display: grid; gap: 10px;">

                        <li style="margin-bottom: 2em;"><b>Justificativa da Solicitação:</b> {{$solicitacaoChave->texto}} </li>

                        <li style="margin-bottom: 2em;"><b>Dia e Horário de Empréstimo:</b> Das {{date('H:i',strtotime($solicitacaoChave->horarioEntrada))}} até {{date('H:i',strtotime($solicitacaoChave->horarioEntrega))}} no dia {{date('d/m', strtotime($solicitacaoChave->diaEmprestimo))}} </li>
                        
                        <li style="margin-bottom: 2em; margin-top: 1em;"><b>Status:</b><span style="margin-left: 5px; background-color: #fc4040; border: 2px solid #880000; padding: 5px; border-radius: 10px;"><b>{{$solicitacaoChave->status}}</b></span></li>
                    
                    </div>

                </div>

                <p>Atenciosamente, Gerenciador da Sala de Música.</p>

            </div>

        @endif
        
    </body>

</html>