<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>
   
    <title>Empréstimos de Equipamentos da Sala de Música</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    @if (auth()->user()->role === 'Usuário' || auth()->user()->role === 'Aluno' || auth()->user()->role === 'Servidor')

        <header class="header-aluno bg-white shadow">

            <div class="header-chave">

                <h1>Solicitações de Empréstimos de Equipamentos</h1>

            </div>

            <div class="header-texto-div">

                <p class="header-texto">
                
                    Aqui temos um controle de empréstimos de equipamentos que será avaliada pelo administrador do site. 
                    Portanto algumas das solicitações podem demorar, então tenha calma. Em caso de alguma dúvida, clique no botão abaixo. Já em casos
                    de algum problema, clique no botão vermelho no canto esquerdo.
                 
                </p>

            </div>

            <div class="header-botoes">

                <div>

                    <a href="{{route('ajuda.ajuda')}}">

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

    @endif
    
    @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Controlador')

        <header class="header-admin bg-white shadow">

            <div class="header-chave">

                <h1>Gerenciamento de Solicitações de Equipamentos</h1>

            </div>

            <div class="header-texto-div">

                <p class="header-texto">
                    
                    Trabalhamos com a mão na massa agora! Essa página é responsável pela confirmação de solicitações. Dessa forma ele mostra as informações dos usuários que estão requisitando.
                    Se atente as solicitações e o que elas falam, e então, escolhe como que ela deve ser registrada. 
                    Tome tempo e gerencie com muito cuidado, amor e carinho.

                </p>

            </div>

            <div class="header-botoes">

                <div>

                    <a href="{{route('ajuda.adminajuda')}}">

                        <button class="botao-header-admin">
            
                            <span>Saiba Mais</span>

                            <svg class="saiba-botao" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right-square" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm4.5 5.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
                            </svg>
                        
                        </button>

                    </a>

                </div>

            </div>

        </header>

    @endif
    
    <section class="conteudo-principal bg-white py-10 mx-auto px-4 sm:px-6 lg:px-8">

        @if (auth()->user()->role === 'Admin' || auth()->user()->role === 'Controlador')

            <div class="botoes-solicitacoes">

                <button type="button" class="btn btn-secondary" style="background-color: pink; color:black; border-color: palevioletred; font-weight: 500;" disabled>Solicitações Atuais</button>

                <a href="{{route('solicitacoes.solicitacoes-equipamentos-recusadas')}}">

                    <button type="button" class="btn btn-danger">Ver Solicitações Rejeitadas</button>
                    
                </a>

            </div>

        @endif
        
        <div class="mx-auto py-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">

            @if(auth()->user()->penalizado === 0)

                <button class="criar-solicitacao justify-center">

                    <a class="link-cabeçalho" href="{{ route('solicitacoes.create', $equipamento->id ,$user->id) }}">
            
                        <svg class="mais-botao" xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                        </svg>
                                
                    </a>
                
                </button>

            @else

                @php

                    $penalizacaoTempo = \Carbon\Carbon::parse(auth()->user()->penalizacao_tempo);

                @endphp
        
                <p class="punicao-tempo"> Atualmente com uma punição, espere até {{ $penalizacaoTempo->format('d/m H:i') }} para fazer novas solicitações.</p>

            @endif
            
            <div class="table-responsive-xxl">

                <table class="table">

                    {{------------------------------------------------------------------- 

                        Usuário 
                                
                    -------------------------------------------------------------------}}

                    @if (auth()->user()->role === 'Aluno' || auth()->user()->role === 'Usuário' || auth()->user()->role === 'Servidor')

                        <thead>

                            <th class="borda-nome" scope="col" width="5%">Usuário</th>
                            
                            <th scope="col" width="5%">Equipamentos</th>

                            <th scope="col" width="2%">Turma</th>

                            <th scope="col" width="3%">Dia do Empréstimo</th>
                                                        
                            <th scope="col" width="1%">Status</th>

                            <th class="borda-status" scope="col" width="1%">Ações</th>
                                       
                        </thead>

                        @foreach($solicitacoes as $solicitacao)

                            @if($solicitacao->status !== 'Rejeitada')

                                <tbody>

                                    <tr @if ($solicitacao->usuario_id === auth()->id()) class="ativo" @endif>
            
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
                                        
                                        <td>

                                            @if($solicitacao->equipamentos !== null)

                                                @foreach($solicitacao->equipamentos as $equipamento)

                                                    <span class="informacoes-usuario">{{ $equipamento->nome }}{{ !$loop->last ? ', ' : '' }}</span>

                                                @endforeach
                                            
                                            @endif

                                        </td>
            
                                        @if($solicitacao->user->role === 'Servidor')
                                        
                                            <td><span class="informacoes-usuario">Servidor</span></td>

                                        @elseif($solicitacao->user->turma === 'Nenhuma' && $solicitacao->user->anoSerie === 'Nenhum' || $solicitacao->user->turma === 'Nenhuma') 

                                            <td><span class="informacoes-usuario">Nenhuma</span></td>

                                        @else

                                            <td><span class="informacoes-usuario">{{ $solicitacao->user->turma }} {{$solicitacao->user->anoSerie}}</span></td>

                                        @endif

                                        <td><span class="informacoes-usuario">Das {{date('H:i',strtotime($solicitacao->horarioEntrada))}} até {{date('H:i',strtotime($solicitacao->horarioEntrega))}} no dia {{date('d/m', strtotime($solicitacao->diaEmprestimo))}}</span></td>
                                        
                                        @switch($solicitacao->status)

                                            @case('Em Posse')

                                                <td><div style="margin-top: 1.6em;"><span class="status-posse">Em Posse</span></div></td>

                                            @break


                                            @case('Alterada')

                                                <td><div style="margin-top: 1.6em;"><span class="status-alterado">Alterada</span></div></td>

                                            @break

                                            @case('Rejeitada')

                                                <td><div style="margin-top: 1.6em;"><span class="status-rejeitado">Rejeitada</span></div></td>

                                            @break

                                            @default

                                            <td><div style="margin-top: 1.6em;"><span class="status-pendente">{{ $solicitacao->status }}</span></div></td>

                                        @endswitch

                                        @if ($solicitacao->usuario_id === auth()->id())

                                            @if ($solicitacao->status !== 'Em Posse' && $solicitacao->status !== 'Alterada')

                                                <td class="borda-status-usuario">

                                                    <div class="botoes-acoes-usuario">

                                                        <div class="botao-status-usuario">

                                                            <a class="mostrar-botao" href="{{ route('solicitacoes.show', $solicitacao->id) }}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#4a4a4a" class="bi bi-eye" viewBox="0 0 16 16">
                                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                                </svg>

                                                            </a>

                                                        </div>

                                                        <div class="botao-status-usuario">

                                                            <a class="mostrar-botao" href="{{ route('solicitacoes.edit', $solicitacao->id) }}">

                                                                <svg class="editar-botao-desenho"  xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#4a4a4a" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                </svg>

                                                            </a>

                                                        </div>

                                                        <div class="botao-status-usuario">

                                                            <button class="excluir-botao" onclick="onDeletar({{$solicitacao->id}})">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                                                    <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                                                                </svg>

                                                            </button>

                                                            <div id="overlay-deletar" class="overlay" onclick="offDeletar()">

                                                                <div class="texto-informacoes">
                        
                                                                    <div id="text-deletar" class="textos-overlay">
                        
                                                                      
                        
                                                                    </div>
                        
                                                                </div>
                        
                                                            </div>

                                                        </div>
                                                    </div>

                                                </td>

                                                @elseif($solicitacao->status === "Alterada")

                                                    <td>
                                                        
                                                        <div style="display:flex; justify-content: center; gap:1em; margin-top: 1.2em; color: #a32b2b">

                                                            <a href="{{route('solicitacoes.confirmarSolicitacaoAlterada', $solicitacao->id)}}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40" fill="#3fa32b">
                                                                    <path d="M620-520q25 0 42.5-17.5T680-580q0-25-17.5-42.5T620-640q-25 0-42.5 17.5T560-580q0 25 17.5 42.5T620-520Zm-280 0q25 
                                                                    0 42.5-17.5T400-580q0-25-17.5-42.5T340-640q-25 0-42.5 17.5T280-580q0 25 17.5 42.5T340-520Zm140 260q68 0 123.5-38.5T684-400h-66q-22 
                                                                    37-58.5 58.5T480-320q-43 0-79.5-21.5T342-400h-66q25 63 80.5 101.5T480-260Zm0 180q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 
                                                                    31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 
                                                                    320q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Z"/>
                                                                </svg>

                                                            </a>

                                                            <a href="{{route('solicitacoes.rejeitarSolicitacaoAlterada', $solicitacao->id)}}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40" fill="#a32b2b">
                                                                    <path d="M620-520q25 0 42.5-17.5T680-580q0-25-17.5-42.5T620-640q-25 0-42.5 17.5T560-580q0 25 17.5 42.5T620-520Zm-280 0q25
                                                                    0 42.5-17.5T400-580q0-25-17.5-42.5T340-640q-25 0-42.5 17.5T280-580q0 25 17.5 42.5T340-520Zm140 100q-68 0-123.5 38.5T276-280h66q22-37 
                                                                    58.5-58.5T480-360q43 0 79.5 21.5T618-280h66q-25-63-80.5-101.5T480-420Zm0 340q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54
                                                                    127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q134 0 
                                                                    227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Z"/>
                                                                </svg>

                                                            </a>

                                                        </div>

                                                    </td>

                                                @elseif($solicitacao->status === "Em Posse")

                                                <td><div style="margin-top: 0.8em;"><span style="color: rgba(128, 128, 128, 0.699); font-weight: 300; text-align: center;">Nenhuma ação necessária a ser feita aqui.</span></div></td>

                                            @endif

                                        @endif

                                    </tr>
                                        
                                </tbody>           

                            @endif

                        @endforeach
                    
                        {{------------------------------------------------------------------- 
                                    
                            Usuário 
                                    
                        -------------------------------------------------------------------}}
                                
                        {{-------------------------------------------------------------------

                            Admin ou Controlador
                                    
                        -------------------------------------------------------------------}}

                    @elseif (auth()->user()->role === 'Admin' || auth()->user()->role === 'Controlador' )
                        
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

                        @foreach($solicitacoes as $solicitacao)

                            @if($solicitacao->status !== 'Rejeitada')

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
                    
                                            <td><button class="botao-texto btn btn-secondary" onclick="on({{ json_encode($solicitacao)}})">Visualizar texto</button></td>

                                            <td>

                                                @if($solicitacao->equipamentos !== null)

                                                    @foreach($solicitacao->equipamentos as $equipamento)

                                                    <span style="position: relative; top:1em;">{{ $equipamento->nome }}{{ !$loop->last ? ', ' : '' }}</span>

                                                    @endforeach

                                                @endif

                                            </td>

                                            <td><span class="informacoes-usuario">{{$solicitacao->user->numeroTelefone}}</span></td>

                                            @if($solicitacao->user->role === 'Servidor')
                                        
                                                <td><span class="informacoes-usuario">Servidor</span></td>

                                            @elseif($solicitacao->user->turma === 'Nenhuma' && $solicitacao->user->anoSerie === 'Nenhum' || $solicitacao->user->turma === 'Nenhuma') 

                                                <td><span class="informacoes-usuario">Nenhuma</span></td>

                                            @else

                                                <td><span class="informacoes-usuario">{{ $solicitacao->user->turma }} {{$solicitacao->user->anoSerie}}</span></td>

                                            @endif

                                            <td><span class="informacoes-usuario">Das {{date('H:i',strtotime($solicitacao->horarioEntrada))}} até {{date('H:i',strtotime($solicitacao->horarioEntrega))}} no dia {{date('d/m', strtotime($solicitacao->diaEmprestimo))}}</span></td>
                                        
                                            @switch($solicitacao->status)

                                                @case('Em Posse')

                                                    <td><div style="margin-top: 1.6em;"><span class="status-posse">Em Posse</span></div></td>

                                                @break


                                                @case('Alterada')

                                                    <td><div style="margin-top: 1.6em;"><span class="status-alterado">Alterada</span></div></td>

                                                @break

                                                @case('Rejeitada')

                                                    <td><div style="margin-top: 1.6em;"><span class="status-rejeitado">Rejeitada</span></div></td>

                                                @break

                                                @default

                                                <td><div style="margin-top: 1.6em;"><span class="status-pendente">{{ $solicitacao->status }}</span></div></td>

                                            @endswitch

                                            @if($solicitacao->status != 'Em Posse' && $solicitacao->status != 'Alterada')

                                                <td class="borda-admin-usuario">

                                                    <div class="botoes-acoes-admin">

                                                        <div class="botao-status-admin">

                                                            <a class="aceitar-botao" href="{{ route('admin.solicitacaoEquipamentoAprovada', $solicitacao->id) }}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#00af17" class="bi bi-check-lg" viewBox="0 0 16 16" >
                                                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
                                                                </svg>
                                                                        
                                                            </a>

                                                        </div>

                                                        <div class="botao-status-admin">

                                                            <a class="editar-botao-admin" href="{{ route('admin.editEquipamento', $solicitacao->id) }}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                </svg>
                                                                        
                                                            </a>

                                                        </div>

                                                        <div class="botao-status-admin">

                                                            <button class="rejeitar-botao" onclick="onRejeitarSolicitacaoOverlay({{ $solicitacao->id }})">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#ff0000" class="bi bi-x" viewBox="0 0 16 16">
                                                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5.0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                                                </svg>

                                                            </button>

                                                        </div>

                                                        <div id="overlay-rejeitar" class="overlay" style="display: none;">

                                                            <div class="texto-overlay-rejeitar">

                                                                <div class="personalizacao-texto-rejeitar">

                                                                    <div style="display: flex; gap:0.3em;">

                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="#a32b99" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                                                                            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                                                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708z"/>
                                                                        </svg>

                                                                        <h2>Rejeitar Solicitação</h2>

                                                                    </div>

                                                                    <form id="form-rejeitar" action="{{ route('admin.solicitacaoEquipamentoRejeitada', $solicitacao->id) }}" method="POST">
                                                                        @csrf

                                                                        <textarea id="comentario-rejeicao" maxlength="600" name="comentario" placeholder="Escreva um comentário..."></textarea>

                                                                        <span id="limite-caracteres" class="limite-caracteres">600</span>

                                                                        <div style="font-size: 18px;">

                                                                            <button class="btn btn-danger" type="submit">Rejeitar</button>

                                                                            <button class="btn btn-secondary" type="button" onclick="offRejeitarSolicitacaoOverlay()">Cancelar</button>

                                                                        </div>

                                                                    </form>

                                                                </div>

                                                            </div>

                                                        </div>

                                                        <div class="botao-status-admin">

                                                            <button class="excluir-botao" onclick="onDeletarAdmin({{ $solicitacao->id }})">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                                                    <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                                                                </svg>

                                                            </button>

                                                            <div id="overlay-deletar-admin" class="overlay" onclick="offDeletarAdmin()">

                                                                <div class="texto-informacoes">
                        
                                                                    <div id="text-deletar-admin" class="textos-overlay">
                        
                        
                                                                    </div>
                        
                                                                </div>
                        
                                                            </div>

                                                        </div>

                                                    </div>

                                                </td>

                                            @elseif($solicitacao->status === 'Alterada')

                                                <td>

                                                    <div class="botoes-acoes-admin">

                                                        <div class="botao-status-admin">

                                                            <a class="editar-botao-admin" href="{{ route('admin.editEquipamento', $solicitacao->id) }}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                </svg>
                                                                        
                                                            </a>

                                                        </div>

                                                        <div class="botao-status-admin">

                                                            <button class="excluir-botao" onclick="onDeletarAdmin({{ $solicitacao->id }})">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                                                    <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                                                                </svg>

                                                            </button>

                                                            <div id="overlay-deletar-admin" class="overlay" onclick="offDeletarAdmin()">

                                                                <div class="texto-informacoes">
                        
                                                                    <div id="text-deletar-admin" class="textos-overlay">
                        
                        
                                                                    </div>
                        
                                                                </div>
                        
                                                            </div>

                                                        </div>

                                                    </div>

                                                </td>

                                            @elseif($solicitacao->status === 'Alterada' && auth()->user()->role === 'Admin' || $solicitacao->status === 'Alterada' && auth()->user()->role === 'Controlador')

                                                <td>

                                                    <div class="botoes-acoes-admin">

                                                        <div style="display:flex; justify-content: center; gap:1em; margin-top: -0.3em; color: #a32b2b">

                                                            <a href="{{route('solicitacoes.confirmarSolicitacaoAlterada', $solicitacao->id)}}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40" fill="#3fa32b">
                                                                    <path d="M620-520q25 0 42.5-17.5T680-580q0-25-17.5-42.5T620-640q-25 0-42.5 17.5T560-580q0 25 17.5 42.5T620-520Zm-280 0q25 
                                                                    0 42.5-17.5T400-580q0-25-17.5-42.5T340-640q-25 0-42.5 17.5T280-580q0 25 17.5 42.5T340-520Zm140 260q68 0 123.5-38.5T684-400h-66q-22 
                                                                    37-58.5 58.5T480-320q-43 0-79.5-21.5T342-400h-66q25 63 80.5 101.5T480-260Zm0 180q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 
                                                                    31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 
                                                                    320q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Z"/>
                                                                </svg>

                                                            </a>

                                                            <a href="{{route('solicitacoes.rejeitarSolicitacaoAlterada', $solicitacao->id)}}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40" fill="#a32b2b">
                                                                    <path d="M620-520q25 0 42.5-17.5T680-580q0-25-17.5-42.5T620-640q-25 0-42.5 17.5T560-580q0 25 17.5 42.5T620-520Zm-280 0q25
                                                                    0 42.5-17.5T400-580q0-25-17.5-42.5T340-640q-25 0-42.5 17.5T280-580q0 25 17.5 42.5T340-520Zm140 100q-68 0-123.5 38.5T276-280h66q22-37 
                                                                    58.5-58.5T480-360q43 0 79.5 21.5T618-280h66q-25-63-80.5-101.5T480-420Zm0 340q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54
                                                                    127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q134 0 
                                                                    227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Z"/>
                                                                </svg>

                                                            </a>

                                                        </div>

                                                        <div class="botao-status-admin">

                                                            <a class="editar-botao-admin" href="{{ route('admin.editEquipamento', $solicitacao->id) }}">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                                                </svg>
                                                                        
                                                            </a>

                                                        </div>

                                                        <div class="botao-status-admin">

                                                            <button class="excluir-botao" onclick="onDeletarAdmin({{ $solicitacao->id }})">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">
                                                                    <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>
                                                                </svg>

                                                            </button>

                                                            <div id="overlay-deletar-admin" class="overlay" onclick="offDeletarAdmin()">

                                                                <div class="texto-informacoes">
                        
                                                                    <div id="text-deletar-admin" class="textos-overlay">
                        
                        
                                                                    </div>
                        
                                                                </div>
                        
                                                            </div>

                                                        </div>

                                                    </div>

                                                </td>

                                            @elseif($solicitacao->status === 'Em Posse')

                                               <div>

                                                    <td>

                                                        <button type="submit" class="botao-confirmar-posse" onclick="onDeletarPosseAdmin({{ $solicitacao->id }})">Confirmar Devolução</button>
                                                        
                                                        <div id="overlay-deletar-posse-admin" class="overlay" onclick="offDeletarPosseAdmin()">

                                                            <div class="texto-informacoes">
                        
                                                                <div id="text-deletar-posse" class="textos-overlay">
                        
                        
                                                                </div>
                        
                                                            </div>
                        
                                                        </div>
                                                                
                                                    </td>

                                                </div>

                                            @endif

                                        </tr> 

                                    </tbody>

                                </div>

                            @endif
                            
                        @endforeach

                        <div id="overlay" onclick="off()">

                            <div class="texto-informacoes">

                                <div id="text">
                                    
                                </div>

                            </div>

                        </div>

                    @endif
 				
                    {{-------------------------------------------------------------------

                        Admin ou Controlador
                                
                    -------------------------------------------------------------------}}      
                
                </table>

            </div>

            <div class="paginacao">

                {!! $solicitacoes->links() !!}
                
            </div>

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

    .main{

        background-color: white;;

    }

    .header-aluno{

        display: grid;
        text-align: center;
        background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('../assets/images/solicitacaoequipamentos.jpeg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-bottom: 1px solid #115204;
        margin-top: -3px;
        height: max-content;

    }

    .header-admin{

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

        background-color: #7ac56b;
        display: inline-flex;
        padding: 10px;
        color: white;
        gap: 10px;
        border: 1px solid green;
        border-radius: 10px;
        width: 9em;
        transition: 0.5s;

    }

    .botao-header-aluno:hover{

        background-color: #4f9641;
        transition: 0.5s;

    }

    .botao-header-admin{

        position: relative;
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

    .botao-header-admin:hover{

        background-color: #960683;
        transition: 0.5s;   

    }

    .botao-precisa-ajuda{

        position: absolute;
        margin-top: 8.2em;
    }

    .saiba-botao{

        margin-top: 0.1em;

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

    .status-confirmado{

        position: relative;
        border: 2px solid #59a3529d;
        padding: 0.2em;
        border-radius: 10px;
        color: black !important;
        background-color: #aaff98;  

    }

    .status-posse{

        position: relative;
        border: 2px solid rgb(17, 207, 0);
        padding: 0.2em;
        border-radius: 10px;
        color: black !important;
        background-color: rgb(114, 223, 92);  

    }

    .status-rejeitado{

        position: relative;
        border: 2px solid #880000;
        padding: 0.2em;
        border-radius: 10px;
        color: black !important;
        background-color: #fc4040; 

    }

    .status-pendente{

        position: relative;
        border: 2px solid #bfc200;
        padding: 0.2em;
        border-radius: 10px;
        color: black !important;
        background-color: #fbff00; 

    }

    .status-alterado{

        position: relative;
        border: 2px solid #bfc200;
        padding: 0.2em;
        border-radius: 10px;
        color: black !important;
        background-color: #fdff6d;   

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
    
    .ativo .nome-usuario, .ativo .informacoes-usuario, .ativo .status-alterado, .ativo .status-pendente, .ativo .status-rejeitado{

        font-weight: bold;
        color: #115204;

    }


    .ativo .status-alterado{

        font-weight: bold;

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

    .textos-overlay{

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
    
    .textos-overlay p{

        font-size: 20px;

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

    .botoes-exclusao{

        display: flex;
        justify-content: center;

    }

    .punicao-tempo{

        padding: 10px;
        background-color: #e47171;
        border-radius: 10px;
        border: 2px solid #880000;
        font-weight: 600;
        text-align: center;

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

    .overlay{

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

    .botao-confirmar{

        background-color: #63a356;
        padding: 10px;
        border-radius: 5px;
        color: white;
        transition: 0.5s;
        margin-top: 0.4em;
        border-radius: 10px;

    }

    .botao-confirmar:hover{

        background-color: #71bd62;
        transition: 0.5s;

    }

    .botao-confirmar-posse{

        padding: 10px;
        border-radius: 5px;
        color: white;
        transition: 0.5s;
        margin-top: 0.5em;
        background-color: #c56bb6;
        border-radius: 10px;

    }

    .botao-confirmar-posse:hover{

        background-color: #f087de;
        transition: 0.5s;

    }

    .editar-botao-admin{

        color: rgb(219, 187, 43);


    }

    .editar-botao-admin svg{

        margin-top: 0.1em;

    }

    .limite-caracteres {

        position: absolute;
        font-size: 12px;
        color: grey;
		margin-top: 14em;
        margin-left: -2.6em;

    }
    
    /* ------------------------------------ Texto ------------------------------------ */

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
        margin-top: 2em;

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

        border-bottom: 1px solid pink;

    }

    .botao-texto{

        margin-top: 1.5em;
        width: 10em;

    }

    .botoes-exclusao{

        display: flex;
        gap: 0.5em;
        justify-content: center;

    }

    .texto-overlay-rejeitar{

        position: absolute;
        top: 30%;
        left: 50%;
        font-size: 50px;
        width: 23em;
        height: 8em;
        box-shadow: 5px 10px #ffcff78a;
        border:5px groove pink;
        border-radius: 10px;
        background-color: rgb(255, 255, 255);
        color:rgb(5, 0, 0);
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        padding: 1em;

    }

    .personalizacao-texto-rejeitar{

        display: grid;

    }

    .personalizacao-texto-rejeitar textarea{

        margin-top: 1em;
        margin-bottom: 1em;
		width: 100%;
		height: 170px;
		padding: 10px 20px;
		box-sizing: border-box;
		border: 2px solid #e6c3e3;
		border-radius: 10px;
		background-color: #f8f8f8;
		font-size: 16px;
		resize: none;
        font-weight: 500;

	}

	.personalizacao-texto-rejeitar textarea:focus {

		outline: none !important;
		border:2px solid rgba(255, 0, 221, 0.603);
		box-shadow: 0 0 10px #ce71c6;

	}
    
     /* ------------------------------------ Paginação ------------------------------------ */

    .paginacao{

        margin: auto;
        margin-top: 1em;
        padding-right: 13em;
        width: 1%;

    }

    .erros-botao{

        cursor: pointer;
        padding: 10px;
        background-color: red;
        border-radius: 10px;
        border: 2px solid rgb(146, 4, 4);

    }

    .panel {

        position: absolute;
        width: 20em;
        padding: 30px;
        display: none;
        background-color: rgba(248, 0, 0, 0.658);
        overflow: hidden;
        border-radius: 10px;
        margin-left: 0.1em;
        margin-top: 2.4em;
        border: 2px solid rgba(165, 42, 42, 0.692);
        z-index: 2;
        font-weight: 600;

    }

    .aviso-erros{

        position: relative;
        display: flex;
        margin-left: 3em;
        margin-top: -3.09em;

    }

    .erros-mensagem{

        padding: 5px;

    }

    tr.solicitacao-ativa{

        color: gray !important;
        font-weight: bold;

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

        .nome-foto{

            max-width: 15em;

        }

        .nome-usuario{

            max-width: 4em; 
            margin-top: -1em;

        }

    }
    /* ------------------------------ 150% ------------------------------ */
    @media (min-width: 1200px) and (max-width: 1399px) {


        .nome-foto{

            max-width: 8em;

        }

        .nome-usuario{

            margin-left: 0.8em;
            max-width: 5em; 
            margin-top: -1em;

        }

        .foto-usuario{
        
            margin-left: -1em;

        }

        .texto-overlay-rejeitar{

            top: 45%;

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

        .textos-overlay{

            top:40%;
            width: 18em;
            height: 6em;

        }

        #text{

            height: 10em;

        }

        .texto-overlay-rejeitar{

            width: 20em;
            top:45%;

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
    
        .textos-overlay{

            top:40%;
            width: 15em;
            height: 6em;

        }

        #text{

            height: 9em;

        }

        .texto-overlay-rejeitar{

            width: 18em;
            top:45%;

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

        
        .textos-overlay{

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

        .texto-overlay-rejeitar{

            width: 14em;
            height:7em;
            top:47%;

        }

        .botoes-rejeitar{

            margin-top: -1.4em;

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

        .textos-overlay{

            top: 50%;
            width: 12em;
            height: 6em;

        }

        .botoes-exclusao{

            font-size: 11px;
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

        .texto-overlay-rejeitar{

            width: 12em;
            height:6em;
            top:47%;
            overflow-x: scroll;

        }

        .personalizacao-texto-rejeitar{

            margin-top: -0.5em;

        }

        .botoes-rejeitar{

            margin-top: -1.4em;

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

        .textos-overlay{

            top: 50%;
            width: 9em;
            height: 4.5em;

        }

        .textos-overlay p{

            font-size: 15px;

        }

        .textos-overlay h2{

            margin-top: -1.5em;

        }

        .textos-overlay button{

            font-size: 12px;

        }

        .botoes-exclusao{

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

        .texto-overlay-rejeitar{

            width: 9em;
            height:4.5em;
            top:47%;
            overflow-x: scroll;

        }

        .personalizacao-texto-rejeitar{

            margin-top: -0.5em;

        }

        .botoes-rejeitar{

            margin-top: -1.4em;

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

        .textos-overlay{

            top: 50%;
            width: 7.2em;
            height: 3.6em;
            overflow-x: scroll;

        }

        .textos-overlay p{

            font-size: 15px;

        }

        .textos-overlay h2{

            margin-top: -1.5em;

        }

        .textos-overlay button{

            font-size: 12px;

        }

        .botoes-exclusao{

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

        .texto-overlay-rejeitar{

            width: 7em;
            height:15em;
            top:47%;
            overflow-x: scroll;

        }

        .personalizacao-texto-rejeitar{

            margin-top: -0.5em;

        }

        .botoes-rejeitar{

            margin-top: 1em;

        }

        #comentario-rejeicao{

            width:15em;
            height:35em;

        }

        .limite-caracteres{

            margin-top: 46.7em;

        }

    }

</style>

<script>

    const textarea = document.getElementById('comentario-rejeicao');
    const charCount = document.getElementById('limite-caracteres');
    const maxLength = textarea.getAttribute('maxlength');

    textarea.addEventListener('input', function() 
	{

        const remaining = maxLength - textarea.value.length;
        charCount.textContent = remaining;

    });
    
    function desabilitarBotao() {

        var button = document.getElementById('botao-devolucao');
        button.disabled = true;
        setTimeout(function() {

            button.disabled = false;

        }, 10000);

    }

    window.onload = function() {

        var botaoDesabilitado = localStorage.getItem('botaoDesabilitado');

        if (botaoDesabilitado === 'true') {

            desabilitarBotao();

        }

    };

    document.getElementById('form-devolucao').addEventListener('submit', function() {

        localStorage.setItem('botaoDesabilitado', 'true'); 

    });

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
        `;

        overlay.style.display = 'block';

    }

    function off() {

        document.getElementById("overlay").style.display = "none";

    }

    function onDeletar(id){

        const overlay = document.getElementById('overlay-deletar');
        const textDiv = document.getElementById('text-deletar');

        textDiv.innerHTML = `

            <h2> Deseja Mesmo Excluir Esta Solicitação? </h2>

            <p> Após a exclusão, a solicitação será deletada <b>permanentemente</b>, considere isso a sua última vez vendo ela.</p>

            <div class="botoes-exclusao">

                <form action="{{ url('/empréstimo-equipamento-sala-de-música/deletar-solicitação') }}/${id}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sim, estou consciente que a solicitação vai ser deletada permanentemente</button>
                </form>

                <button style="margin-left: 1em; height: 2.4em;" class="botao-cancelar btn btn-secondary" onclick="offDeletar()">Cancelar</button>
            
            </div>
        `;

        overlay.style.display = 'block';

    }

    function offDeletar() {

        document.getElementById("overlay-deletar").style.display = "none";

    }

    function onDeletarAdmin(id) {

        const overlay = document.getElementById('overlay-deletar-admin');
        const textDiv = document.getElementById('text-deletar-admin');

        textDiv.innerHTML = `

            <h2> Deseja Mesmo Excluir Esta Solicitação? </h2>

            <p> Após a exclusão, a solicitação será deletada <b>permanentemente</b>, considere isso a sua última vez vendo ela.</p>

            <div class="botoes-exclusao">

                <form action="{{ url('/empréstimo-equipamento-sala-de-música/solicitação') }}/${id}/admin/excluir-solicitação" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sim, estou consciente que a solicitação vai ser deletada permanentemente</button>
                </form>

                <button style="margin-left: 1em; height: 2.4em;" class="botao-cancelar btn btn-secondary" onclick="offDeletarAdmin()">Cancelar</button>
            
            </div>
        `;

        overlay.style.display = 'block';

    }

    function offDeletarAdmin() {

        document.getElementById("overlay-deletar-admin").style.display = "none";

    }

    function onDeletarPosseAdmin(id) {

        const overlay = document.getElementById('overlay-deletar-posse-admin');
        const textDiv = document.getElementById('text-deletar-posse');

        textDiv.innerHTML = `

            <h2> Deseja Confirmar a Devolução do Usuário? </h2>

            <p> Após confirmar, a solicitação deixará de existir nos registros, pois o processo de empréstimo foi finalizado.</p>

            <div class="botoes-exclusao">

                <form action="{{ url('/empréstimo-equipamento-sala-de-música/solicitação') }}/${id}/admin/excluir-solicitação" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Sim, confirmo a devolução da chave</button>
                </form>

                <button style="margin-left: 1em; height: 2.4em;" class="botao-cancelar btn btn-secondary" onclick="offDeletarPosseAdmin()">Cancelar</button>
            
            </div>
        `;

        overlay.style.display = 'block';

    }

    function offDeletarPosseAdmin() {

        document.getElementById("overlay-deletar-posse-admin").style.display = "none";

    }

    function onRejeitarSolicitacaoOverlay(id) {

        document.getElementById('form-rejeitar').action = `/empréstimo-equipamento-sala-de-música/solicitação/rejeitar-solicitação-equipamento/${id}`;
        document.getElementById('overlay-rejeitar').style.display = 'block';

    }

    function offRejeitarSolicitacaoOverlay() {

        document.getElementById('overlay-rejeitar').style.display = 'none';

    }

</script>

    