<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Usuários do Site</title>

    <div class="container text-center">

        <div class="row">

            <ul class="tab-header">

                <li class="tab-item active" onclick="openTab('alunos')">Alunos</li>

                <li class="tab-item" onclick="openTab('servidores')">Servidores</li>

                <li class="tab-item" onclick="openTab('admins')">Administradores</li>

                <li class="tab-item" onclick="openTab('usuarios')">Usuários</li>

                <li class="tab-item relatorio-geral-botao"><button type="button" onclick="onRelatorioGeral()">Relatório Geral</button></li>

            </ul>

            <div class="overlay" id="overlay-relatorio-geral" onclick="offRelatorioGeral()">
                                
                <div class="textos-relatorio-geral" id="text-relatorio-geral">
                    
                    
                </div>
                    
            </div>

            <div class="container-principal p-3 rounded bg-white">

                <div class="lista-usuarios">

                    <div class="conteudo-roles" id="alunos">

                        <img class="icone-aluno" src="\assets\images\aluno-icone.svg"/>

                        <h2>Alunos</h2> 
                            
                        <div class="table-responsive-xxl">

                            <table class="table">

                                <thead>

                                    <th scope="col" width="8%">Usuário</th>
                    
                                    <th scope="col" width="1%">Matrícula</th>
            
                                    <th scope="col" width="1%">Email</th>
            
                                    <th scope="col" width="3%">Identificação</th>
            
                                    <th scope="col" width="3%">Contato</th>
            
                                    <th scope="col" width="1%">Gerenciamento</th>

                                    <th scope="col" width="1%">Ações</th>
            
                                </thead>
                                
                                <tbody>

                                    @foreach($alunos as $aluno)

                                        <tr>

                                            <td>

                                                <div class="informacoes-usuario-nome">
                                                
                                                    @if($aluno->imagem === NULL)

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" fill="#dad7da" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                                        </svg>
                                
                                                    @elseif($aluno->imagem != NULL)
                    
                                                        <img style="height:60px; width:60px; border-radius:50% !important; border:1px solid #dad7da;" src="{{$aluno->imagem}}"/>
                    
                    
                                                    @endif

                                                    <span class="nome">{{$aluno->nome}}</span>

                                                </div>
                                            
                                            </td>

                                            <td><span class="informacoes-usuario">{{$aluno->matricula}}</span></td>

                                            <td><span class="informacoes-usuario">{{$aluno->email}}</span></td>

                                            <td><span class="informacoes-usuario">{{$aluno->role}}</span></td>

                                            <td><span class="informacoes-usuario" id="numeroTelefone">{{$aluno->numeroTelefone}}</span></td>

                                            <td>

                                                @if (auth()->user()->role === 'Controlador')

                                                    <form action="{{ route('admin.atualizarCargo', $aluno->id) }}" method="post">
                                                        @csrf
                                                        @method('POST')

                                                        <select name="role" onchange="this.form.submit()">

                                                            <option value="Admin" {{ $aluno->role == 'Admin' ? 'selected' : '' }}>Admin</option>

                                                            <option value="Aluno" {{ $aluno->role == 'Aluno' ? 'selected' : '' }}>Aluno</option>

                                                            <option value="Servidor" {{ $aluno->role == 'Servidor' ? 'selected' : '' }}>Servidor</option>

                                                            <option value="Usuário" {{ $aluno->role == 'Usuário' ? 'selected' : '' }}>Usuário</option>

                                                        </select>

                                                    </form>

                                                @endif

                                            </td>

                                            <td>

                                                <div style="display: flex; gap:1em; justify-content: center;">

                                                    <div>

                                                        @if($aluno->penalizado === 0)

                                                            <button class="penalizacao-botao" type="button" onclick="onPenalizacao({{ $aluno->id }}, '{{ $aluno->nome }}')">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                                </svg>

                                                            </button>

                                                        @else
                                                        
                                                            <button class="penalizacao-botao" type="button" onclick="onRemoverPenalizacao({{ $aluno->id }}, '{{ $aluno->nome }}')">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#db3dac" class="bi bi-dash-square-fill" viewBox="0 0 16 16">
                                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm2.5 7.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1"/>
                                                                </svg>

                                                            </button>

                                                        @endif

                                                    </div>

                                                    <div>

                                                        <button class="relatorio-botao" style="color: #b46a99" onclick="onRelatorioUsuario({{ $aluno->id }}, '{{ $aluno->nome }}')">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                                            </svg>

                                                        </button>

                                                        <div id="overlay-relatorio-usuario-{{$aluno->id}}" class="overlay" onclick="offRelatorioUsuario({{$aluno->id}})">
                                
                                                            <div id="text-relatorio-usuario-{{$aluno->id}}" class="textos-relatorio">
                                                                 
                                                            </div>
                                                                
                                                        </div>

                                                    </div>

                                                </div>

                                            </td>

                                            <div id="overlay-penalizacao-{{$aluno->id}}" class="overlay">

                                                <div class="texto-informacoes">
        
                                                    <div class="text-penalizacao" id="text-penalizacao{{ $aluno->id }}">
                
                                                        <div class="header-penalizacao">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                            </svg>

                                                            <h1>Penalização para "<span id="penalizacao-nome-{{$aluno->id}}"></span>"</h1>

                                                        </div>

                                                        <p>Deseja mesmo aplicar uma penalização para este usuário?</p>

                                                        <h2> ► Sim, desejo aplicar uma penalização por: </h2>
                                                           
                                                        <div class="botao-penalizacao">

                                                            <form method="POST" action="{{ route('penalizar.usuario', ['user' => $aluno->id]) }}">
                                                                @csrf

                                                                <div class="botoes-penalizar" style="display: flex; justify-content: center; gap:5em;">

                                                                    <button class="penalizacao-leve" name="penalizacao" value="1dia">1 Dia</button>

                                                                    <button class="penalizacao-leve" name="penalizacao" value="2dias">2 Dias</button>

                                                                    <button class="penalizacao-leve" name="penalizacao" value="3dias">3 Dias</button>

                                                                    <button class="penalizacao-media" name="penalizacao" value="1semana">1 Semana</button>

                                                                    <button class="penalizacao-media" name="penalizacao" value="2semanas">2 Semanas</button>

                                                                    <button class="penalizacao-pesada" name="penalizacao" value="1mes">1 Mês</button>

                                                                </div>

                                                                <div style="display: flex; justify-content: center;">

                                                                    <textarea class="motivo-penalizacao" maxlength="300" name="motivo-penalizacao" placeholder="Escreva o motivo da penalização."></textarea>

                                                                    <span class="limite-caracteres">300</span>

                                                                </div>

                                                            </form>

                                                        </div>

                                                        <button style="margin-top: 3em;" class="btn btn-secondary mx-auto d-block" onclick="offPenalizacao({{$aluno->id}})">Cancelar</button>
        
                                                    </div>
        
                                                </div>
        
                                            </div>

                                            <div id="overlay-remover-penalizacao-{{ $aluno->id }}" class="overlay" onclick="offRemoverPenalizacao({{ $aluno->id }})">

                                                <div class="texto-informacoes">
        
                                                    <div class="text-penalizacao-remover" id="text-remover-penalizacao{{ $aluno->id }}">
                
                                                        <div class="header-penalizacao">

                                                            <svg style="margin-top: 0.13em;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#db3dac" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927"/>
                                                              </svg>

                                                            <h1>Remover Penalização de "<span id="penalizacao-nome-remover-{{$aluno->id}}"></span>"</h1>

                                                        </div>

                                                        <p>► Mudou de ideia? Clique no botão abaixo para remover a penalização do usuário, e se desejar, pode colocar novamente outro mais tarde.</p>
                                                        
                                                            <div class="botoes-remover-penalizacao">

                                                                <form action="{{ route('penalizar.remover-penalizacao', ['userId' => $aluno->id]) }}" method="post">
                                                                    @csrf
                                                                    @method('POST')

                                                                    <button type="submit" class="botao-remover-penalizacao"> Sim, mudei de ideia e desejo remover a penalização</button>

                                                                </form>

                                                                <button type="button" class="btn btn-secondary">Cancelar</button>
            
                                                            </div>


                                                    </div>
        
                                                </div>
        
                                            </div>

                                        </tr>
                                            
                                    @endforeach
                                    
                                </tbody>

                            </table>
                            
                        </div>

                        <div class="paginacao">

                            {{ $alunos->links() }}

                        </div>

                    </div>

                    <div class="conteudo-roles" id="servidores" style="display: none;">

                        <svg class="icone-servidor" xmlns="http://www.w3.org/2000/svg" width="50px" height="50px" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/>
                        </svg>

                        <h2>Servidores</h2>

                        <div class="table-responsive-xxl">

                            <table class="table">

                                <thead>

                                    <th scope="col" width="5%">Usuário</th>
                    
                                    <th scope="col" width="1%">Matrícula</th>
            
                                    <th scope="col" width="1%">Email</th>
            
                                    <th scope="col" width="3%">Identificação</th>
            
                                    <th scope="col" width="3%">Contato</th>
            
                                    <th scope="col" width="1%">Gerenciamento</th>
            
                                    <th scope="col" width="1%">Punição</th>

                                </thead>

                                <tbody>

                                    @foreach($servidores as $servidor)

                                        <tr>

                                            <td>

                                                <div class="informacoes-usuario-nome">
                                                    
                                                    @if($servidor->imagem === NULL)

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" fill="#dad7da" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                                        </svg>
                                
                                                    @elseif($servidor->imagem != NULL)
                    
                                                        <img style="height:60px; width:60px; border-radius:50% !important; border:1px solid #dad7da;" src="{{$servidor->imagem}}"/>
                    
                    
                                                    @endif

                                                    <span class="nome">{{$servidor->nome}}</span>

                                                </div>

                                            </td>
                                                                                        
                                            <td><span class="informacoes-usuario">{{$servidor->matricula}}</span></td>
                                            
                                            <td><span class="informacoes-usuario">{{$servidor->email}}</span></td>
                                            
                                            <td><span class="informacoes-usuario">{{$servidor->role}}</span></td>
                                            
                                            <td><span class="informacoes-usuario" id="numeroTelefone">{{$servidor->numeroTelefone}}</span></td>
                                            
                                            <td>

                                                @if (auth()->user()->role === 'Controlador')

                                                    <form action="{{ route('admin.atualizarCargo', $servidor->id) }}" method="post">
                                                        @csrf
                                                        @method('POST')

                                                        <select name="role" onchange="this.form.submit()">

                                                            <option value="Admin" {{ $servidor->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                            
                                                            <option value="Aluno" {{ $servidor->role == 'Aluno' ? 'selected' : '' }}>Aluno</option>
                                                            
                                                            <option value="Servidor" {{ $servidor->role == 'Servidor' ? 'selected' : '' }}>Servidor</option>
                                                            
                                                            <option value="Usuário" {{ $servidor->role == 'Usuário' ? 'selected' : '' }}>Usuário</option>
                                                        
                                                        </select>

                                                    </form>

                                                @endif

                                            </td>

                                            <td>

                                                <div style="display: flex; gap:1em; justify-content: center;">

                                                    <div>

                                                        @if($servidor->penalizado === 0)

                                                            <button class="penalizacao-botao" type="button" onclick="onPenalizacao({{ $servidor->id }}, '{{ $servidor->nome }}')">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                                </svg>

                                                            </button>

                                                        @else
                                                        
                                                            <button class="penalizacao-botao" type="button" onclick="onRemoverPenalizacao({{ $servidor->id }}, '{{ $servidor->nome }}')">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#db3dac" class="bi bi-dash-square-fill" viewBox="0 0 16 16">
                                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm2.5 7.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1"/>
                                                                </svg>

                                                            </button>

                                                        @endif

                                                    </div>

                                                    <div>

                                                        <button class="relatorio-botao" style="color: #b46a99" onclick="onRelatorioUsuario({{ $servidor->id }}, '{{ $servidor->nome }}')">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                                            </svg>

                                                        </button>

                                                        <div id="overlay-relatorio-usuario-{{$servidor->id}}" class="overlay" onclick="offRelatorioUsuario({{ $servidor->id }})">
                                
                                                            <div id="text-relatorio-usuario-{{$servidor->id}}" class="textos-relatorio">
                                                                 
                                                            </div>
                                                                
                                                        </div>

                                                    </div>

                                                </div>

                                            </td>

                                            <div id="overlay-penalizacao-{{$servidor->id}}" class="overlay">

                                                <div class="texto-informacoes">
        
                                                    <div class="text-penalizacao" id="text-penalizacao{{ $servidor->id }}">
                
                                                        <div class="header-penalizacao">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                            </svg>

                                                            <h1>Penalização para "<span id="penalizacao-nome-{{$servidor->id}}"></span>"</h1>

                                                        </div>

                                                        <p>Deseja mesmo aplicar uma penalização para este usuário?</p>

                                                        <h2> ► Sim, desejo aplicar uma penalização por: </h2>
                                                           
                                                        <div class="botao-penalizacao">

                                                            <form method="POST" action="{{ route('penalizar.usuario', ['user' => $servidor->id]) }}">
                                                                @csrf

                                                                <div class="botoes-penalizar" style="display: flex; justify-content: center; gap:5em;">

                                                                    <button class="penalizacao-leve" name="penalizacao" value="1dia">1 Dia</button>

                                                                    <button class="penalizacao-leve" name="penalizacao" value="2dias">2 Dias</button>

                                                                    <button class="penalizacao-leve" name="penalizacao" value="3dias">3 Dias</button>

                                                                    <button class="penalizacao-media" name="penalizacao" value="1semana">1 Semana</button>

                                                                    <button class="penalizacao-media" name="penalizacao" value="2semanas">2 Semanas</button>

                                                                    <button class="penalizacao-pesada" name="penalizacao" value="1mes">1 Mês</button>

                                                                </div>

                                                                <div style="display: flex; justify-content: center;">

                                                                    <textarea class="motivo-penalizacao" maxlength="300" name="motivo-penalizacao" placeholder="Escreva o motivo da penalização."></textarea>

                                                                    <span class="limite-caracteres">300</span>

                                                                </div>

                                                            </form>

                                                        </div>

                                                        <button style="margin-top: 3em;" class="btn btn-secondary mx-auto d-block" onclick="offPenalizacao({{$servidor->id}})">Cancelar</button>
        
                                                    </div>
        
                                                </div>
        
                                            </div>

                                            <div id="overlay-remover-penalizacao-{{ $servidor->id }}" class="overlay" onclick="offRemoverPenalizacao({{ $servidor->id }})">

                                                <div class="texto-informacoes">
        
                                                    <div class="text-penalizacao-remover" id="text-remover-penalizacao{{ $servidor->id }}">
                
                                                        <div class="header-penalizacao">

                                                            <svg style="margin-top: 0.13em;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#db3dac" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927"/>
                                                              </svg>

                                                            <h1>Remover Penalização de "<span id="penalizacao-nome-remover-{{$servidor->id}}"></span>"</h1>

                                                        </div>

                                                        <p>► Mudou de ideia? Clique no botão abaixo para remover a penalização do usuário, e se desejar, pode colocar novamente outro mais tarde.</p>
                                                        
                                                        <div class="botoes-remover-penalizacao">

                                                            <form action="{{ route('penalizar.remover-penalizacao', ['userId' => $servidor->id]) }}" method="post">
                                                                @csrf
                                                                @method('POST')

                                                                <button type="submit" class="botao-remover-penalizacao"> Sim, mudei de ideia e desejo remover a penalização</button>

                                                            </form>

                                                            <button type="button" class="btn btn-secondary">Cancelar</button>
            
                                                        </div>

                                                    </div>
        
                                                </div>
        
                                            </div>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>
                        
                        <div class="paginacao">

                            {{ $servidores->links() }}

                        </div>

                    </div>

                    <div class="conteudo-roles" id="admins" style="display: none;">

                        <svg class="icone-admin" xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                        </svg>

                        <h2>Admins</h2>                        
                          
                        <div class="table-responsive-xxl">

                            <table class="table">

                                <thead>

                                    <th scope="col" width="5%">Usuário</th>
                    
                                    <th scope="col" width="1%">Matrícula</th>
            
                                    <th scope="col" width="1%">Email</th>
            
                                    <th scope="col" width="3%">Identificação</th>
            
                                    <th scope="col" width="3%">Contato</th>
            
                                    <th scope="col" width="1%">Gerenciamento</th>
            
                                    <th scope="col" width="1%">Punição</th>

                                </thead>

                                <tbody>

                                    @foreach($administradores as $admin)

                                        <tr>

                                            <td>

                                                <div class="informacoes-usuario-nome">
                                                    
                                                    @if($admin->imagem === NULL)

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" fill="#dad7da" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                                        </svg>
                                
                                                    @elseif($admin->imagem != NULL)
                    
                                                        <img style="height:60px; width:60px; border-radius:50% !important; border:1px solid #dad7da;" src="{{$admin->imagem}}"/>
                    
                    
                                                    @endif

                                                    <span class="nome">{{$admin->nome}}</span>

                                                </div>

                                            </td>
                                                                                    
                                            <td><span class="informacoes-usuario">{{$admin->matricula}}</span></td>
                                            
                                            <td><span class="informacoes-usuario">{{$admin->email}}</span></td>
                                            
                                            <td><span class="informacoes-usuario">{{$admin->role}}</span></td>
                                            
                                            <td><span class="informacoes-usuario" id="numeroTelefone">{{$admin->numeroTelefone}}</span></td>
                                            
                                            <td>

                                                @if (auth()->user()->role === 'Controlador')

                                                    <form action="{{ route('admin.atualizarCargo', $admin->id) }}" method="post">
                                                        @csrf
                                                        @method('POST')

                                                        <select name="role" onchange="this.form.submit()">

                                                            <option value="Admin" {{ $admin->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                            
                                                            <option value="Aluno" {{ $admin->role == 'Aluno' ? 'selected' : '' }}>Aluno</option>
                                                            
                                                            <option value="Servidor" {{ $admin->role == 'Servidor' ? 'selected' : '' }}>Servidor</option>
                                                            
                                                            <option value="Usuário" {{ $admin->role == 'Usuário' ? 'selected' : '' }}>Usuário</option>
                                                        
                                                        </select>

                                                    </form>

                                                @endif

                                            </td>

                                            <td>

                                                <div style="display: flex; gap:1em; justify-content: center;">

                                                    <div>

                                                        @if($admin->penalizado === 0)

                                                            <button class="penalizacao-botao" type="button" onclick="onPenalizacao({{ $admin->id }}, '{{ $admin->nome }}')">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                                </svg>

                                                            </button>

                                                        @else
                                                        
                                                            <button class="penalizacao-botao" type="button" onclick="onRemoverPenalizacao({{ $admin->id }}, '{{ $admin->nome }}')">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#db3dac" class="bi bi-dash-square-fill" viewBox="0 0 16 16">
                                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm2.5 7.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1"/>
                                                                </svg>

                                                            </button>

                                                        @endif

                                                    </div>

                                                    <div>

                                                        <button class="relatorio-botao" style="color: #b46a99" onclick="onRelatorioUsuario({{ $admin->id }}, '{{ $admin->nome }}')">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                                            </svg>

                                                        </button>

                                                        <div id="overlay-relatorio-usuario-{{$admin->id}}" class="overlay" onclick="offRelatorioUsuario({{ $admin->id }})">
                                
                                                            <div id="text-relatorio-usuario-{{$admin->id}}" class="textos-relatorio">
                                                                 
                                                            </div>
                                                                
                                                        </div>

                                                    </div>

                                                </div>

                                            </td>

                                            <div id="overlay-penalizacao-{{$admin->id}}" class="overlay">

                                                <div class="texto-informacoes">
        
                                                    <div class="text-penalizacao" id="text-penalizacao{{ $admin->id }}">
                
                                                        <div class="header-penalizacao">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                            </svg>

                                                            <h1>Penalização para "<span id="penalizacao-nome-{{$admin->id}}"></span>"</h1>

                                                        </div>

                                                        <p>Deseja mesmo aplicar uma penalização para este usuário?</p>

                                                        <h2> ► Sim, desejo aplicar uma penalização por: </h2>
                                                           
                                                        <div class="botao-penalizacao">

                                                            <form method="POST" action="{{ route('penalizar.usuario', ['user' => $admin->id]) }}">
                                                                @csrf

                                                                <div class="botoes-penalizar" style="display: flex; justify-content: center; gap:5em;">

                                                                    <button class="penalizacao-leve" name="penalizacao" value="1dia">1 Dia</button>

                                                                    <button class="penalizacao-leve" name="penalizacao" value="2dias">2 Dias</button>

                                                                    <button class="penalizacao-leve" name="penalizacao" value="3dias">3 Dias</button>

                                                                    <button class="penalizacao-media" name="penalizacao" value="1semana">1 Semana</button>

                                                                    <button class="penalizacao-media" name="penalizacao" value="2semanas">2 Semanas</button>

                                                                    <button class="penalizacao-pesada" name="penalizacao" value="1mes">1 Mês</button>

                                                                </div>

                                                                <div style="display: flex; justify-content: center;">

                                                                    <textarea class="motivo-penalizacao" maxlength="300" name="motivo-penalizacao" placeholder="Escreva o motivo da penalização."></textarea>

                                                                    <span class="limite-caracteres">300</span>

                                                                </div>

                                                            </form>

                                                        </div>

                                                        <button style="margin-top: 3em;" class="btn btn-secondary mx-auto d-block" onclick="offPenalizacao({{$admin->id}})">Cancelar</button>
        
                                                    </div>
        
                                                </div>
        
                                            </div>

                                            <div id="overlay-remover-penalizacao-{{ $admin->id }}" class="overlay" onclick="offRemoverPenalizacao({{ $admin->id }})">

                                                <div class="texto-informacoes">
        
                                                    <div class="text-penalizacao-remover" id="text-remover-penalizacao{{ $admin->id }}">
                
                                                        <div class="header-penalizacao">

                                                            <svg style="margin-top: 0.13em;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#db3dac" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927"/>
                                                              </svg>

                                                            <h1>Remover Penalização de "<span id="penalizacao-nome-remover-{{$admin->id}}"></span>"</h1>

                                                        </div>

                                                        <p>► Mudou de ideia? Clique no botão abaixo para remover a penalização do usuário, e se desejar, pode colocar novamente outro mais tarde.</p>
                                                        
                                                        <div class="botoes-remover-penalizacao">

                                                            <form action="{{ route('penalizar.remover-penalizacao', ['userId' => $admin->id]) }}" method="post">
                                                                @csrf
                                                                @method('POST')

                                                                <button type="submit" class="botao-remover-penalizacao"> Sim, mudei de ideia e desejo remover a penalização</button>

                                                            </form>

                                                            <button type="button" class="btn btn-secondary">Cancelar</button>
            
                                                        </div>

                                                    </div>
        
                                                </div>
        
                                            </div>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                        <div class="paginacao">

                            {{ $administradores->links() }}

                        </div>

                    </div>

                    <div class="conteudo-roles" id="usuarios" style="display: none;">

                        <svg class="icone-usuario" xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                        </svg>

                        <h2>Usuários</h2>

                        <div class="table-responsive-xxl">

                            <table class="table">
        
                                <thead>

                                    <th scope="col" width="5%">Usuário</th>
                    
                                    <th scope="col" width="1%">Matrícula</th>
            
                                    <th scope="col" width="1%">Email</th>
            
                                    <th scope="col" width="3%">Identificação</th>
            
                                    <th scope="col" width="3%">Contato</th>
            
                                    <th scope="col" width="1%">Gerenciamento</th>
            
                                    <th scope="col" width="1%">Punição</th>

                                </thead>

                                <tbody>

                                    @foreach($usuarios as $usuario)

                                        <tr>
 
                                            <td>

                                                <div class="informacoes-usuario-nome">
                                                        
                                                    @if($usuario->imagem === NULL)

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="60px" height="60px" fill="#dad7da" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                                                        </svg>
                                
                                                    @elseif($usuario->imagem != NULL)
                    
                                                        <img style="height:60px; width:60px; border-radius:50% !important; border:1px solid #dad7da;" src="{{$usuario->imagem}}"/>
                    
                    
                                                    @endif

                                                    <span class="nome">{{$usuario->nome}}</span>

                                                </div>

                                            </td>
                                            
                                            <td><span class="informacoes-usuario">{{$usuario->matricula}}</span></td>
                                            
                                            <td><span class="informacoes-usuario">{{$usuario->email}}</span></td>
                                            
                                            <td><span class="informacoes-usuario">{{$usuario->role}}</span></td>
                                            
                                            <td><span class="informacoes-usuario" id="numeroTelefone">{{$usuario->numeroTelefone}}</span></td>
                                            
                                            <td>

                                                @if (auth()->user()->role === 'Controlador')

                                                    <form action="{{ route('admin.atualizarCargo', $usuario->id) }}" method="post">
                                                        @csrf
                                                        @method('POST')

                                                        <select name="role" onchange="this.form.submit()">

                                                            <option value="Admin" {{ $usuario->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                                            
                                                            <option value="Aluno" {{ $usuario->role == 'Aluno' ? 'selected' : '' }}>Aluno</option>
                                                            
                                                            <option value="Servidor" {{ $usuario->role == 'Servidor' ? 'selected' : '' }}>Servidor</option>
                                                            
                                                            <option value="Usuário" {{ $usuario->role == 'Usuário' ? 'selected' : '' }}>Usuário</option>
                                                        
                                                        </select>

                                                    </form>

                                                @endif

                                            </td>

                                            <td>

                                                <div style="display: flex; gap:1em; justify-content: center;">

                                                    <div>

                                                        @if($usuario->penalizado === 0)

                                                            <button class="penalizacao-botao" type="button" onclick="onPenalizacao({{ $usuario->id }}, '{{ $usuario->nome }}')">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                                </svg>

                                                            </button>

                                                        @else
                                                        
                                                            <button class="penalizacao-botao" type="button" onclick="onRemoverPenalizacao({{ $usuario->id }}, '{{ $usuario->nome }}')">

                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#db3dac" class="bi bi-dash-square-fill" viewBox="0 0 16 16">
                                                                    <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm2.5 7.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1 0-1"/>
                                                                </svg>

                                                            </button>

                                                        @endif

                                                    </div>

                                                    <div>

                                                        <button class="relatorio-botao" style="color: #b46a99" onclick="onRelatorioUsuario({{ $usuario->id }}, '{{ $usuario->nome }}')">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                                                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
                                                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
                                                            </svg>

                                                        </button>

                                                        <div id="overlay-relatorio-usuario-{{$usuario->id}}" class="overlay" onclick="offRelatorioUsuario({{ $usuario->id }})">
                                
                                                            <div id="text-relatorio-usuario-{{$usuario->id}}" class="textos-relatorio">
                                                                 
                                                            </div>
                                                                
                                                        </div>

                                                    </div>

                                                </div>

                                            </td>

                                            <div id="overlay-penalizacao-{{$usuario->id}}" class="overlay">

                                                <div class="texto-informacoes">
        
                                                    <div class="text-penalizacao" id="text-penalizacao{{ $usuario->id }}">
                
                                                        <div class="header-penalizacao">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="bi bi-exclamation-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                                                            </svg>

                                                            <h1>Penalização para "<span id="penalizacao-nome-{{$usuario->id}}"></span>"</h1>

                                                        </div>

                                                        <p>Deseja mesmo aplicar uma penalização para este usuário?</p>

                                                        <h2> ► Sim, desejo aplicar uma penalização por: </h2>
                                                           
                                                        <div class="botao-penalizacao">

                                                            <form method="POST" action="{{ route('penalizar.usuario', ['user' => $usuario->id]) }}">
                                                                @csrf

                                                                <div class="botoes-penalizar" style="display: flex; justify-content: center; gap:5em;">

                                                                    <button class="penalizacao-leve" name="penalizacao" value="1dia">1 Dia</button>

                                                                    <button class="penalizacao-leve" name="penalizacao" value="2dias">2 Dias</button>

                                                                    <button class="penalizacao-leve" name="penalizacao" value="3dias">3 Dias</button>

                                                                    <button class="penalizacao-media" name="penalizacao" value="1semana">1 Semana</button>

                                                                    <button class="penalizacao-media" name="penalizacao" value="2semanas">2 Semanas</button>

                                                                    <button class="penalizacao-pesada" name="penalizacao" value="1mes">1 Mês</button>

                                                                </div>

                                                                <div style="display: flex; justify-content: center;">

                                                                    <textarea class="motivo-penalizacao" maxlength="300" name="motivo-penalizacao" placeholder="Escreva o motivo da penalização."></textarea>

                                                                    <span class="limite-caracteres">300</span>

                                                                </div>

                                                            </form>

                                                        </div>

                                                        <button style="margin-top: 3em;" class="btn btn-secondary mx-auto d-block" onclick="offPenalizacao({{$usuario->id}})">Cancelar</button>
        
                                                    </div>
        
                                                </div>
        
                                            </div>

                                            <div id="overlay-remover-penalizacao-{{ $usuario->id }}" class="overlay" onclick="offRemoverPenalizacao({{ $usuario->id }})">

                                                <div class="texto-informacoes">
        
                                                    <div class="text-penalizacao-remover" id="text-remover-penalizacao{{ $usuario->id }}">
                
                                                        <div class="header-penalizacao">

                                                            <svg style="margin-top: 0.13em;" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="#db3dac" class="bi bi-question-square-fill" viewBox="0 0 16 16">
                                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927"/>
                                                              </svg>

                                                            <h1>Remover Penalização de "<span id="penalizacao-nome-remover-{{$usuario->id}}"></span>"</h1>

                                                        </div>

                                                        <p>► Mudou de ideia? Clique no botão abaixo para remover a penalização do usuário, e se desejar, pode colocar novamente outro mais tarde.</p>
                                                        
                                                        <div class="botoes-remover-penalizacao">

                                                            <form action="{{ route('penalizar.remover-penalizacao', ['userId' => $usuario->id]) }}" method="post">
                                                                @csrf
                                                                @method('POST')

                                                                <button type="submit" class="botao-remover-penalizacao"> Sim, mudei de ideia e desejo remover a penalização</button>

                                                            </form>

                                                            <button type="button" class="btn btn-secondary">Cancelar</button>
            
                                                        </div>

                                                    </div>
        
                                                </div>
        
                                            </div>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                        <div class="paginacao">

                            {{ $usuarios->links() }}

                        </div>

                    </div>

                </div>
            
            </div>

        </div>

    </div>

    @include('footer.footer')

</x-app-layout>

<style>

    *{

        text-decoration: none !important;


    }

    .main{

        background-color: #ffdede;

    }


    td{

        position: relative;
        margin:6em;

    }

    table{

        border-top: none;

    }

    .container-principal{

        z-index: 1 !important;
        border: 2px solid #3b002e65;
        margin-bottom: 37em;
        height: max-content;

    }

    h2{

        text-align: start;
        margin-left: 2.2em;
        margin-bottom: 1.5em;

    }


    /* ---------------------------------------------------- Botões de Direcionamento para as Roles ---------------------------------------------------- */

    .tab-item{

        position: relative;
        border: 2px solid #3b002e65;   
        background-color: #fcecfa;
        width: 9em;
        height: 2em;
        top: 1.5em;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        right: 0.67em;
        transition: 0.2s;
        cursor: pointer;

    }

    .tab-item:hover{

        position: relative;
        transition: 0.2s;
        background-color: #fce0fa;
        font-weight: bold;
        top: 1.2em;
        transition: 0.3s;

    }
    .tab-header{

        display: flex;
        margin-top: 40px;
        gap:10px;

    }
    /* ---------------------------------------------------- Lista de Usuários ---------------------------------------------------- */

    .informacoes-usuario-nome{

        position: relative;
        text-align: center;

    }

    .informacoes-usuario{

        position: relative;
        top: 1.1em;

    }

    .nome{

        position: relative;
        bottom: 2.2em;
        left: 2em;

    }

    select{

        margin-top: 0.6em;
        appearance: none;
        -webkit-appearance: none;
        width: 100%;
        font-size: 14px;
        background-color: #fff5ff;
        border: 1px solid #caced1;
        border-radius: 10px;
        border-color: pink;
        color: #000;
        cursor: pointer;
        
    }

    option:hover{

        background-color: #000;

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

    .text-penalizacao{

        position: absolute;
        top: 48%;
        left: 50%;
        font-size: 50px;
        width: 23em;
        height: 18em;
        border-radius: 10px;
        box-shadow: 5px 10px #ffd9fa;
        border: 2px solid rgba(80, 0, 73, 0.514);
        background-color: rgb(255, 246, 254);
        color:rgb(5, 0, 0);
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        padding: 1em;
        text-align: start;
        cursor: context-menu;

    }

    .text-penalizacao-remover{

        position: absolute;
        top: 35%;
        left: 50%;
        font-size: 50px;
        width: 23em;
        height: 10em;
        border-radius: 10px;
        box-shadow: 5px 10px #ffd9fa;
        border: 2px solid rgba(80, 0, 73, 0.514);
        background-color: rgb(255, 246, 254);
        color:rgb(5, 0, 0);
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        padding: 1em;
        text-align: start;
        cursor: context-menu;

    }

    .text-penalizacao p, .text-penalizacao-remover p{

        font-size: 25px;
        margin-left: 1.6em;

    }

    .botao-penalizacao{

        font-size: 14px;
        text-align: start;

    }

    .text-penalizacao h2{

        font-size: 24px;
        color: red;
        text-align: start;

    }

    .botao-penalizacao{

        display: grid;
        justify-content: center;
        gap: 100px;
        margin-left: -5em;

    }

    .header-penalizacao{

        display: flex;
        gap: 10px;
        border-bottom: 2px solid rgba(97, 0, 68, 0.541);
        margin-bottom: 0.5em;
        padding-bottom: 20px;

    }

    .header-penalizacao svg{

        margin-top: 0.2em;

    }

    .penalizacao-leve{

        padding: 10px;
        background-color: rgb(83, 167, 83);
        border-radius: 10px;
        border: 2px solid rgba(3, 85, 3, 0.596);
        color: white;
        transition: 0.5s;

    }

    .penalizacao-media{

        padding: 10px;
        background-color: rgb(252, 255, 70);
        border-radius: 10px;
        border: 2px solid rgba(77, 85, 3, 0.596);
        color: rgb(0, 0, 0);
        transition: 0.5s;

    }

    .penalizacao-pesada{

        padding: 10px;
        background-color: rgb(253, 55, 55);
        border-radius: 10px;
        border: 2px solid rgba(85, 3, 3, 0.596);
        color: white;
        transition: 0.5s;

    }

    .penalizacao-botao, .relatorio-botao{

        margin-top: 0.6em;

    }

    .botoes-remover-penalizacao{

        display: flex;
        justify-content: center;
        gap: 50px;
        margin-top: 1em;

    }

    .botao-remover-penalizacao{

        padding: 10px;
        background-color: #e9a1cf;
        border-radius: 2px solid rgba(105, 2, 97, 0.692);
        font-size: 16px;
        border-radius: 5px;
        font-weight: 600;
        transition: 0.5s;

    }

    .botao-remover-penalizacao:hover{

        background-color: #b46a99; 

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
        z-index: 3;

    }

    .relatorio{

        display: flex;
        gap: 4em;
        width: 100%;

    }

    .relatorio li{

        text-shadow: 0 1px rgb(124, 119, 119);

    }

    .textos-relatorio h2{

        margin-top: 0.5em;

    }

    .textos-relatorio{

        position: absolute;
        top: 47%;
        left: 50%;
        font-size: 20px;
        width: 50em;
        height: 35em;
        border-radius: 10px;
        box-shadow: 5px 10px #e7abd5;
        border: 2px solid rgba(219, 39, 204, 0.671);
        background-color: rgb(255, 255, 255);
        color:rgb(5, 0, 0);
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        padding: 1em;
        z-index: 3;
        cursor: auto;

    }

    .textos-relatorio-geral{

        position: absolute;
        top: 47%;
        left: 50%;
        font-size: 20px;
        width: 50em;
        height: 43em;
        border-radius: 10px;
        box-shadow: 5px 10px #e7abd5;
        border: 2px solid rgba(219, 39, 204, 0.671);
        background-color: rgb(255, 255, 255);
        color:rgb(5, 0, 0);
        transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        padding: 1em;
        z-index: 3;
        cursor: auto;

    }

    #text-relatorio-geral{

        text-align: center !important;

    }

    .relatorio-chaves{

        border-right: 2px solid pink;
        text-align: start;
        width: 50%;
        margin-left: 1em;

    }

    .relatorio-chaves li, .relatorio-equipamentos li{

        margin-top: 1em;
        list-style-type: disc;

    }

    .relatorio-equipamentos{

        margin-left: -1em;
        width: 50%;
        text-align: start;

    }

    .relatorio-geral-botao{

        background-color: #eeb4e1;

    }

    .relatorio-geral li{

        text-shadow: 0 1px rgb(124, 119, 119);
        text-align: center;


    }

    .relatorio-geral h2{

        text-align: center;
        margin-left: 0;

    }

    .relatorio-chaves-geral, .relatorio-equipamentos-geral{

        margin-bottom: 1em;
        border-bottom: 2px solid pink;

    }

    .penalizacao-relatorio-geral{

        border-right: 2px solid pink;
        padding-right: 5em;
        margin-left: 2em;

    }
    .equipamentos-relatorio-geral h3{

        margin-bottom: 1em;

    }

    .penalizacao-relatorio-geral h3{

        margin-bottom: 1em;

    }

    .relatorio-chaves-geral ul li, .relatorio-equipamentos-geral ul li{

        padding: 5px;


    }

    .penalizacao-relatorio{

        width: 100%;
        border-top: 2px solid pink;
        display: grid;
        justify-content: center;
        text-align: center;

    }

    .penalizacao-relatorio h3{

        margin-top: 1em;
        margin-bottom: 1em;

    }

    .penalizacao-relatorio span{

        font-weight: 500;
        color: #c03b3b;

    }

    .botao-relatorio-penalizacao{

        padding: 10px;
        background-color: #c03b3b;
        margin-top: 2em;
        border: 2px solid #691515;
        border-radius: 10px;
        font-size: 18px;
        transition: 0.5s;
        color: white;

    }
    
    .botao-relatorio-penalizacao:hover{

        background-color: #e25a5a;
        transition: 0.5s;

    }

    textarea{

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

	textarea:focus {

		outline: none !important;
		border:2px solid rgba(255, 0, 221, 0.603);
		box-shadow: 0 0 10px #ce71c6;

	}

    .limite-caracteres {

        position: absolute;
        font-size: 12px;
        color: grey;
        margin-right: -62em;
        margin-top: 14em;

    }
    /* ---------------------------------------------------- Ícones ---------------------------------------------------- */


    .icone-aluno{

        position: absolute;
        width: 50px;
        height: 50px;
        margin-top: -0.4em;

    }

    .icone-servidor{

        position: absolute;
        margin-top: -0.4em;

    }

    .icone-admin{

        position: absolute;
        margin-top: -0.8em;

    }

    .icone-usuario{

        position: absolute;
        margin-top: -0.8em;


    }

    .paginacao{

        margin: auto;
        margin-top: 1em;
        padding-right: 13em;
        width: 1%;

    }


    /* -------------------------------------------------------- Ajustamento da Tela -------------------------------------------------------- */

    @media (min-width: 3636px) and (max-width: 4799px) {

        .personalizacao-footer{

            margin-top: 28.9em;

        }

    }

    @media (min-width: 5760px) and (max-width: 7679px) {

        .personalizacao-footer{

            margin-top: 149.5em;

        }

    }

    @media (min-width: 1600px) and (max-width: 1799px) {

        .text-penalizacao{

            height: 17em;
            top: 49%;

        }

        .text-penalizacao-remover{

            top: 40%;

        }

        .textos-relatorio-geral{

            top: 50%;
            height: 42em;

        }

    }

    @media (min-width: 1400px) and (max-width: 1599px) {

        .text-penalizacao{

            height: 15em;
            top: 49%;

        }

        .botoes-penalizar{

            margin-top: -5em;

        }

        textarea{

            margin-top: -4em;

        }

        .penalizacao-leve, .penalizacao-media, .penalizacao-pesada{

            height: 3em;

        }

        .text-penalizacao-remover{

            top: 45%;

        }

        .limite-caracteres{

            margin-top: 7.5em;

        }

        .textos-relatorio-geral{

            top: 50%;
            overflow-y: scroll;
            height: 38em;

        }

    }

    @media (min-width: 1200px) and (max-width: 1499px) {

        .informacoes-usuario-nome{

            max-width: 10em !important;

        }

        .nome{

            left: 4.5em;

        }

        .text-penalizacao{

            height: 12em;
            top: 49%;
            overflow-y: scroll;

        }

        .botoes-penalizar{

            margin-top: -5em;

        }

        textarea{

            margin-top: -4em;

        }

        .penalizacao-leve, .penalizacao-media, .penalizacao-pesada{

            height: 3em;

        }

        .text-penalizacao-remover{

            top: 45%;

        }

        .textos-relatorio{

            height: 31em;
            top: 49%;

        }
        
        .textos-relatorio-geral{

            top: 49%;
            height: 31em;
            overflow-y: scroll;

        }

        .penalizacao-relatorio h3{

            margin-top: 0.4em;

        }

        .botao-relatorio-penalizacao{

            margin-top: 1em;

        }

        .limite-caracteres{

            margin-top: 7.4em;

        }

    }

    @media (min-width: 1050px) and (max-width: 1199px) {

        .informacoes-usuario-nome{

            width: 10em;

        }

        .nome{

            left: 4em;

        }

        .text-penalizacao{

            height: 10.5em;
            width: 21em;
            top: 49%;
            overflow-y: scroll;

        }

        .textos-relatorio-geral{

            top: 49%;
            height: 27em;
            overflow-y: scroll;

        }

        .botoes-penalizar{

            margin-top: -5em;

        }

        textarea{

            margin-top: -4em;

        }

        .penalizacao-leve, .penalizacao-media, .penalizacao-pesada{

            height: 3em;

        }


        .botao-penalizacao{

            gap: 80px;

        }

        .text-penalizacao-remover{

            top: 50%;
            width: 21em;

        }

        .textos-relatorio{

            height: 26em;
            overflow-y: scroll;

        }

        .limite-caracteres{

            margin-top: 7.4em;

        }

    }

    /* ------------------------------ 200% ------------------------------ */
    @media (min-width: 900px) and (max-width: 1049px) {

        .container-principal{

            margin-bottom: 4em;

        }

        .nome{

            position: relative;
            top: 0.1em;
            left: -0.3em;

        }

        .informacoes-usuario{

            font-size: 14px;

        }
        
        #numeroTelefone{

            position: absolute;
            margin-top: 0.1em;
            margin-left: -3em;

        }

        .botao-penalizacao{

            margin-left: 1em;

        }

        .text-penalizacao{

            top: 48%;
            height: 9em;
            width: 18em;
            overflow-y: scroll;

        }

        .botoes-penalizar{

            font-size: 12px;

        }

        .botao-penalizacao{

            gap: 60px;

        }

        .text-penalizacao-remover{

            top: 50%;
            width: 18em;
            height: 9em;

        }

        .textos-relatorio{

            height: 22em;
            top: 50%;
            width: 45em;
            overflow-y: scroll;

        }

        .textos-relatorio-geral{

            top: 49%;
            height: 23em;
            width: 45em;
            overflow-y: scroll;

        }

        .limite-caracteres{

            margin-left: -7em;

        }

    }

    /* ------------------------------ 250% ------------------------------ */
    @media (min-width: 750px) and (max-width: 899px) {

        .container-principal{

            margin-bottom: 4em;

        }
        .nome{

            position: relative;
            top: 0.1em;
            left: -0.4em;
            font-size: 14px;

        }
        .informacoes-usuario{

            font-size: 14px;

        }

        #numeroTelefone{

            position: absolute;
            margin-top: 0.1em;
            margin-left: -3em;

        }

        .text-penalizacao{

            top: 48%;
            height: 7em;
            width: 15em;
            overflow-x: scroll;

        }

        .botao-penalizacao{

            margin-left: 0.5em;
            margin-top: -4em;

        }

        .botoes-penalizar{

            font-size: 10px;

        }

        .text-penalizacao-remover{

            top: 50%;
            width: 14.6em;
            height: 7em;

        }

        .botoes-remover-penalizacao{

            margin-top: -0.1em;

        }

        .textos-relatorio{

            height: 18em;
            top: 50%;
            width: 36em;
            overflow-y: scroll;

        }

        .limite-caracteres{

            margin-left: -14.7em;

        }

        .textos-relatorio-geral{

            top: 49%;
            height: 18em;
            width: 37em;
            overflow-y: scroll;

        }

    }

    /* ------------------------------ 300% ------------------------------ */
    @media (min-width: 600px) and (max-width: 659px) {

        .container-principal{

            margin-bottom: 4em;

        }

        .nome{

            position: relative;
            top: 0.1em;
            left: -0.5em;
            font-size: 14px;

        }

        .informacoes-usuario{

            font-size: 14px;

        }

        #numeroTelefone{

            position: absolute;
            margin-top: 0.1em;
            margin-left: -3em;

        }

        .text-penalizacao{

            top: 48%;
            height: 6em;
            width: 12em;
            overflow-x: scroll;

        }

        .botao-penalizacao{

            margin-left: 0.5em;
            margin-top: -4em;

        }

        .botoes-penalizar{

            font-size: 10px;

        }

        .text-penalizacao-remover{

            top: 50%;
            width: 12em;
            height: 6em;
            overflow-y: scroll;

        }

        .textos-relatorio{

            height: 15em;
            top: 48%;
            width: 31em;
            overflow-y: scroll;

        }


        .botao-relatorio-penalizacao{

            font-size: 16px;

        }

        .limite-caracteres{

            margin-left: -18.4em;

        }

        .textos-relatorio-geral{

            top: 49%;
            height: 15em;
            width: 30em;
            overflow-y: scroll;

        }

        .relatorio-equipamentos h3, .relatorio-chaves h3, .penalizacao-relatorio h3, .penalizacao-relatorio-geral h3, 
        .relatorio-chaves-geral h3, .relatorio-equipamentos-geral h3, .equipamentos-relatorio-geral h3{

            font-size: 18px;

        }

        .relatorio-equipamentos li, .relatorio-chaves li, .penalizacao-relatorio li, .penalizacao-relatorio-geral li, 
        .relatorio-chaves-geral li, .relatorio-equipamentos-geral li, .equipamentos-relatorio-geral li, .penali{

            font-size: 15px;

        }

    }

    /* ------------------------------ 400% ------------------------------ */
    @media (min-width: 450px) and (max-width: 539px) {

        .tab-item{

            font-size: 14px;
            margin-bottom: -0.1em;

        }

        .container-principal{

            margin-bottom: 4em;

        }
        .nome{

            position: relative;
            top: 0.1em;
            left: -0.4em;
            font-size: 12px;

        }
        .informacoes-usuario{

            font-size: 12px;

        }

        #numeroTelefone{

            position: absolute;
            margin-top: 0.1em;
            margin-left: -3em;

        }

        select{

            font-size: 12px;
            
        }

        .text-penalizacao{

            top: 48%;
            height: 4.5em;
            width: 9em;
            overflow-x: scroll;

        }

        .botao-penalizacao{

            margin-left: 0.5em;
            margin-top: -1em;
            font-size: 10px;

        }

        textarea{

            width: 25em;

        }

        .text-penalizacao-remover{

            top: 53%;
            width: 9em;
            height: 4.5em;
            overflow-y: scroll;

        }

        .textos-relatorio{

            height: 11em;
            top: 48%;
            width: 23em;
            overflow-y: scroll;

        }

        .relatorio-chaves{

            margin-left: -1em;
            width: 60% !important;
            font-size: 14px;

        }

        .relatorio-equipamentos{

            width: 40%;
            font-size: 14px;

        }
        
        .botao-relatorio-penalizacao{

            font-size: 14px;

        }

        .limite-caracteres{

            margin-left: -32em;

        }
        
        .textos-relatorio-geral{

            top: 49%;
            height: 15em;
            width: 32em;
            overflow-y: scroll;
            font-size: 14px;

        }

        .relatorio-equipamentos h3, .relatorio-chaves h3, .penalizacao-relatorio h3, .penalizacao-relatorio-geral h3, 
        .relatorio-chaves-geral h3, .relatorio-equipamentos-geral h3, .equipamentos-relatorio-geral h3{

            font-size: 18px;

        }

        .relatorio-equipamentos li, .relatorio-chaves li, .penalizacao-relatorio li, .penalizacao-relatorio-geral li, 
        .relatorio-chaves-geral li, .relatorio-equipamentos-geral li, .equipamentos-relatorio-geral li, .penali{

            font-size: 12px;

        }

    }

    /* ------------------------------ 500% ------------------------------ */
    @media (min-width: 300px) and (max-width: 449px) {

        .tab-item{

            font-size: 12px;
            margin-bottom: -0.3em;

        }

        .container-principal{

            margin-bottom: 4em;

        }

        .nome{

            position: relative;
            top: 0.1em;
            left: -0.4em;
            font-size: 12px;

        }

        .informacoes-usuario{

            top:2em;
            font-size: 12px;

        }

        #numeroTelefone{

            position: absolute;
            margin-top: 0.5em;
            margin-left: -3em;

        }

        select{

            margin-top: 1em;
            font-size: 12px;

        }

        .text-penalizacao{

            top: 48%;
            height: 3.5em;
            width: 7.3em;
            overflow-x: scroll;

        }

        textarea{

            width: 20em;
            margin-left: 4em;

        }

        .botao-penalizacao{

            margin-top: -1em;
            font-size: 10px;

        }

        .botoes-penalizar{

            display: grid !important;
            margin-left: 4em;

        }

        .text-penalizacao-remover{

            top: 50%;
            width: 7em;
            height: 3.5em;
            overflow-y: scroll;

        }

        .textos-relatorio{

            height: 9em;
            top: 48%;
            width: 18em;
            overflow-y: scroll;

        }

        .relatorio-chaves{

            margin-left: -0.1em;
            width: 60% !important;

        }

        .relatorio-equipamentos{

            width: 40%;
            margin-left: -3em;

        }

        .relatorio-equipamentos h3, .relatorio-chaves h3, .penalizacao-relatorio h3, .penalizacao-relatorio-geral h3, 
        .relatorio-chaves-geral h3, .relatorio-equipamentos-geral h3, .equipamentos-relatorio-geral h3{

            font-size: 18px;

        }

        .relatorio-equipamentos li, .relatorio-chaves li, .penalizacao-relatorio li, .penalizacao-relatorio-geral li, 
        .relatorio-chaves-geral li, .relatorio-equipamentos-geral li, .equipamentos-relatorio-geral li, .penali{

            font-size: 12px;

        }

        .botao-relatorio-penalizacao{

            font-size: 12px;

        }

        .limite-caracteres{

            margin-left: -33em;

        }

        .textos-relatorio-geral{

            top: 49%;
            height: 13em;
            width: 25em;
            overflow-y: scroll;
            font-size: 14px;

        }

        .penalizacao-equipamento-geral{

            gap: 1px;

        }

        .penalizacao-relatorio-geral{

            padding-right: 1em;

        }

        .equipamentos-relatorio-geral{

            margin-left: -3.5em;

        }

    }

</style>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        const textareas = document.getElementsByClassName('motivo-penalizacao');
        const charCounts = document.getElementsByClassName('limite-caracteres');

        for (let i = 0; i < textareas.length; i++) {
            const textarea = textareas[i];
            const charCount = charCounts[i];
            const maxLength = textarea.getAttribute('maxlength');

            textarea.addEventListener('input', function() {
                const remaining = maxLength - textarea.value.length;
                charCount.textContent = remaining;
            });
        }
    });

    function openTab(roleSeparadas) {

        var i, listaUsuarios;

        listaUsuarios = document.getElementsByClassName("conteudo-roles");

        for (i = 0; i < listaUsuarios.length; i++) 
        {

            listaUsuarios[i].style.display = "none";
            
        }

        document.getElementById(roleSeparadas).style.display = "block";

        localStorage.setItem('activeTab', roleSeparadas);

    }

    document.addEventListener("DOMContentLoaded", function() 
    {

        var activeTab = localStorage.getItem('activeTab');

        if (activeTab) 
        {

            openTab(activeTab);

        }
    });

    function onPenalizacao(userId, nome) 
    {

        document.getElementById(`overlay-penalizacao-${userId}`).style.display = "block";
        document.getElementById(`penalizacao-nome-${userId}`).textContent = nome;

    }

    function offPenalizacao(userId) 
    {

        document.getElementById(`overlay-penalizacao-${userId}`).style.display = "none";

    }

    function onRemoverPenalizacao(userId, nome) 
    {

        document.getElementById(`overlay-remover-penalizacao-${userId}`).style.display = "block";
        document.getElementById(`penalizacao-nome-remover-${userId}`).textContent = nome;

    }

    function offRemoverPenalizacao(userId) 
    {

        document.getElementById(`overlay-remover-penalizacao-${userId}`).style.display = "none";

    }

    function onRelatorioUsuario(userId, userName) {
    
        const overlay = document.getElementById(`overlay-relatorio-usuario-${userId}`);
        const conteudoDiv = document.getElementById(`text-relatorio-usuario-${userId}`);

        fetch(`/admin/relatorio-usuario/${userId}`).then(response => response.json()).then(data => {
            
            conteudoDiv.innerHTML = `

                <h2>Relatório do Usuário: ${userName}</h2>
                    
                <div class="relatorio">

                    <div class="relatorio-chaves">

                        <h3>Empréstimo de Chaves</h3>

                        <ul>

                            <li style="color:#00cc00;">Total de Vezes que Pegou a Chave: ${data.emprestimoChave['em-posse']}</li>
                            <li style="color:#66ff33;">Solicitações Confirmadas: ${data.emprestimoChave['confirmadas']}</li>
                            <li style="color:#ff1a1a;">Solicitações Rejeitadas: ${data.emprestimoChave['rejeitadas']}</li>
                            <li style="color:#ff5050;">Solicitações Alteradas Rejeitadas: ${data.emprestimoChave['alteradas-rejeitadas']}</li>
                            <li>Total de Solicitações Feitas: ${data.emprestimoChave['total']}</li>

                        </ul>
                                
                    </div>

                    <div class="relatorio-equipamentos">

                        <h3>Empréstimo de Equipamentos</h3>

                        <ul>

                            <li style="color:#00cc00;">Total de Vezes que Pegou um Equipamento: ${data.emprestimoEquipamento['em-posse']}</li>
                            <li style="color:#ff1a1a;">Solicitações Rejeitadas: ${data.emprestimoEquipamento['rejeitadas']}</li>
                            <li style="color:#ff5050;">Solicitações Alteradas Rejeitadas: ${data.emprestimoEquipamento['alteradas-rejeitadas']}</li>
                            <li>Total de Solicitações Feitas: ${data.emprestimoEquipamento['total']}</li>

                        </ul>

                    </div>

                </div>

                <div class="penalizacao-relatorio">

                    <h3>Penalizações</h3>

                    <span>Total: ${data.totalPenalizacoes} </span>

                    <a href="{{url('/admin/historico-de-penalizacoes/${userId}') }}">

                        <button type="button" class="botao-relatorio-penalizacao"> Ver Histórico de Penalizações</button>

                    </a>
                    
                </div>

            `;

            overlay.style.display = 'block';

        })

    }

    function offRelatorioUsuario() 
    {

        document.getElementById("overlay-relatorio-usuario").style.display = "none";

    }

    function offRelatorioUsuario(userId) 
    {

        document.getElementById(`overlay-relatorio-usuario-${userId}`).style.display = 'none';

    }

    function onRelatorioGeral() {
    
        const overlay = document.getElementById('overlay-relatorio-geral');
        const conteudoDiv = document.getElementById('text-relatorio-geral');

        fetch('/admin/relatorio-geral').then(response => response.json()).then(data => {
            
            conteudoDiv.innerHTML = `
                    
                <div class="relatorio-geral">

                    <h2>Relatório Geral</h2>

                    <div class="relatorio-chaves-geral">

                        <h3>Empréstimo de Chaves</h3>

                        <ul>

                            <li style="color:#10690d;">Total de Solicitações Criadas: ${data.emprestimoChave['solicitacoes-criadas']}</li>
                            <li style="color:#00cc00;">Total de Chaves Entregues: ${data.emprestimoChave['em-posse']}</li>
                            <li style="color:#66ff33;">Total de Solicitações Confirmadas: ${data.emprestimoChave['confirmadas']}</li>
                            <li style="color:#ff1a1a;">Total de Solicitações Rejeitadas: ${data.emprestimoChave['rejeitadas']}</li>
                            <li style="color:#ff5050;">Total de Solicitações Alteradas Rejeitadas: ${data.emprestimoChave['alteradas-rejeitadas']}</li>
                            <li>Total de Solicitações: ${data.emprestimoChave['total']}</li>

                        </ul>
                                
                    </div>

                    <div class="relatorio-equipamentos-geral">

                        <h3>Empréstimo de Equipamentos</h3>

                        <ul>

                            <li style="color:#10690d;">Total de Solicitações Criadas: ${data.emprestimoEquipamento['solicitacoes-criadas']}</li>
                            <li style="color:#00cc00;">Total de Equipamentos Emprestados: ${data.emprestimoEquipamento['em-posse']}</li>
                            <li style="color:#ff1a1a;">Total de Solicitações Rejeitadas: ${data.emprestimoEquipamento['rejeitadas']}</li>
                            <li style="color:#ff5050;">Total de Solicitações Alteradas Rejeitadas: ${data.emprestimoEquipamento['alteradas-rejeitadas']}</li>
                            <li>Total de Solicitações Feitas: ${data.emprestimoEquipamento['total']}</li>

                        </ul>

                    </div>

                </div>

                <div class="penalizacao-equipamento-geral" style="display: flex; justify-content: center; gap:5em;">

                    <div class="penalizacao-relatorio-geral">

                        <h3>Penalizações</h3>

                        <span>Total: ${data.totalPenalizacoes} </span>
                        
                    </div>

                    <div class="equipamentos-relatorio-geral">

                        <h3>Equipamentos</h3>

                        <span>Total: ${data.totalEquipamentos} </span> 

                    </div>

                </div>

            `;

            overlay.style.display = 'block';

        })

    }

    function offRelatorioGeral() 
    {

        document.getElementById("overlay-relatorio-geral").style.display = "none";

    }
</script>