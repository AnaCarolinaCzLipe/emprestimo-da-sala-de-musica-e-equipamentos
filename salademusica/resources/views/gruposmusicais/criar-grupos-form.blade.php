<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Adicionar Novos Grupos Musicais</title>

    <div class="p-4 rounded" style="background-color: #ffdede;">
    
        <div class="container container-principal mx-auto sm:px-6 lg:px-8">
            
            <div class="lead">
    
                <h2>Adicionar Novos Grupos Musicais</h2>
        
            </div>

            <form method="POST" action="{{ route('gruposmusicais.store')}}" enctype="multipart/form-data">
                @csrf

                {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                
                <div class="criar-grupo">

                    <label for="nome-grupo">Nome do Grupo:</label>
                    
                    <x-text-input maxlength="70" value="{{ old('nome-grupo') }}" type="text" class="nome-grupo" name="nome-grupo" placeholder="Insira o nome do grupo aqui." required/>
                    
                    <x-input-error class="mt-2" :messages="$errors->get('nome-grupo')"/>
               
                </div>

                <div class="fotos-grupo">

                    <h2> Foto(s) do Grupo </h2>

                    <div id="imagem-input">
                                                
                        @if(old('foto-grupo'))

                            @foreach(old('foto-grupo') as $index => $fotoGrupo)

                                <div class="fotos">

                                    <label class="imagem" for="input-file-{{ $index }}">

                                        <span class="imagem-display">&#65291;</span>

                                    </label>
                                        
                                    <div class="input-grupos-adicionar" id="input-grupos-adicionar-{{ $index }}">

                                        <input id="input-file-{{ $index }}" class="input-file" name="foto-grupo[]" accept=".jpg,.jpeg,.png,.gif" type="file" multiple autofocus/>
                                        
                                        <x-input-error class="mt-2" :messages="$errors->get('foto-grupo.'.$index)"/>
                                    
                                    </div>

                                </div>

                            @endforeach

                        @else

                            <div class="fotos">

                                <label class="imagem" for="input-file-1">

                                    <span class="imagem-display">&#65291;</span>
                                    
                                </label>

                                <div class="input-grupos-adicionar" id="input-grupos-adicionar-1">

                                    <input id="input-file-1" class="input-file" name="foto-grupo[]" accept=".jpg,.jpeg,.png,.gif" type="file" multiple autofocus>
                                    
                                    <x-input-error class="mt-2" :messages="$errors->get('foto-grupo.1')"/>

                                </div>

                            </div>

                        @endif

                    </div>

                    <button type="button" class="botao-adicionar-foto btn btn-secondary" id="add-foto-btn">Adicionar Mais Foto</button>

                </div>

                <div class="criar-grupo">

                    <label for="informacao-grupo">Informações Sobre o Grupo Musical</label>
                    
                    <textarea maxlength="700" id="informacao-grupo" class="informacao-grupo" name="informacao-grupo" placeholder="Insira as informações sobre o grupo aqui" rows="1" cols="1" required>{{ old('informacao-grupo') }}</textarea>
                    
                    <span id="limite-caracteres" class="limite-caracteres">700</span>

                    <x-input-error class="mt-2" :messages="$errors->get('informacao-grupo')"/>

                </div>

                <div class="integrantes-grupo">

                    <h2> Integrantes do Grupo Musical </h2>

                    <div id="integrantes-grupo-input">

                        @if(old('integrantes'))

                            @foreach(old('integrantes') as $index => $integrante)

                                <div class="integrantes" id="integrante-cor-display-{{ $index }}">

                                    <div class="imagem-integrante">

                                        <label class="imagem-integrantes" for="integrante-foto-{{ $index }}">

                                            <span class="imagem-display">&#65291;</span>

                                        </label>

                                        <input type="file" id="integrante-foto-{{ $index }}" class="input-file" name="integrantes[{{ $index }}][foto]" accept=".jpg,.jpeg,.png,.gif" multiple/>
                                        
                                        <x-input-error class="mt-2" :messages="$errors->get('integrantes.'.$index.'.foto')"/>
                                    
                                    </div>

                                    <div class="form-group">

                                        <label for="integrante-nome-{{ $index }}">Nome do Integrante</label>
                                        
                                        <input type="text" id="integrante-nome-{{ $index }}" name="integrantes[{{ $index }}][nome]" value="{{ old('integrantes.'.$index.'.nome') }}" required>
                                        
                                        <x-input-error class="mt-2" :messages="$errors->get('integrantes.'.$index.'.nome')"/>
                                    
                                    </div>

                                    <div class="turma-ano">

                                        <div class="input-box-select-turma">
                                            
                                            <label for="integrantes-turma-{{ $index }}">Turma</label>
    
                                            <select name="integrantes[{{ $index }}][turma]" class="block mt-1 w-full">
    
                                                @foreach($turmas as $turma)
    
                                                    <option value="{{ $turma }}">{{ $turma }}</option>
                                                    
                                                @endforeach
                                                
                                            </select>
    
                                        </div>
    
                                        <div id="ano-serie-div" class="input-box-select-ano">
                                            
                                            <label for="integrantes-ano-serie-{{ $index }}">Ano Série</label>
    
                                            <select name="integrantes[{{ $index }}][anoSerie]" class="block mt-1 w-full">
    
                                                @foreach($anoSeries as $anoSerie)
    
                                                    <option value="{{ $anoSerie }}">{{ $anoSerie }}</option>
    
                                                @endforeach
    
                                            </select>
    
                                        </div>
    
                                    </div>

                                    <div class="form-group">

                                        <label for="integrante-funcao-{{ $index }}">Função do Integrante</label>

                                        <input type="text" id="integrante-funcao-{{ $index }}" name="integrantes[{{ $index }}][funcao]" value="{{ old('integrantes.'.$index.'.funcao') }}" required>
                                        
                                        <x-input-error class="mt-2" :messages="$errors->get('integrantes.'.$index.'.funcao')"/>
                                    
                                    </div>

                                    <div class="input-box-rede-social">

                                        <label for="integrante-redeSocial-{{ $index }}">Rede Principal do Integrante</label>

                                        <select id="integrante-redeSocial-{{ $index }}" class="block mt-1 w-full" name="integrantes[{{ $index }}][redeSocial]">

                                            <option value="" disabled selected>Selecione uma rede social</option>

                                            <option value="Facebook">Facebook</option>
                                            <option value="Instagram">Instagram</option>
                                            <option value="Twitter">Twitter</option>
                                            <option value="LinkedIn">LinkedIn</option>
                                            <option value="WhatsApp">WhatsApp</option>
                                            <option value="TikTok">TikTok</option>
                                            <option value="Pinterest">Pinterest</option>
                                            <option value="YouTube">YouTube</option>

                                        </select>

                                        <x-input-error class="mt-2" :messages="$errors->get('integrantes.{{ $index }}.redeSocial')"/>

                                    </div> 

                                    <div class="form-group" id="input-rede-social" style="display: none; text-align: center;">

                                        <label for="integrante-linkRedeSocial-{{ $index }}">Link direto para a rede social</label>

                                        <input type="text" id="integrante-linkRedeSocial-0" name="integrantes[{{ $index }}][linkRedeSocial]">

                                        <p style="font-size: 10px; color:gray;">Caso seja selecionado WhatsApp, coloque apenas o número do integrante</p>

                                        <x-input-error class="mt-2" :messages="$errors->get('integrantes.{{ $index }}.linkRedeSocial')"/>

                                    </div>

                                    <div class="form-group-color">

                                        <label for="integrante-cor-{{ $index }}">Cor do Integrante</label>

                                        <input type="color" class="input-integrante-cor" id="integrante-cor-{{ $index }}" name="integrantes[{{ $index }}][cor]" value="{{ old('integrantes.'.$index.'.cor') }}">
                                    
                                        <x-input-error class="mt-2" :messages="$errors->get('integrantes.'.$index.'.cor')"/>

                                    </div>

                                </div>

                            @endforeach

                        @else
                        
                            <div class="integrantes" id="integrante-cor-display-0">

                                <div class="imagem-integrante">

                                    <label class="imagem-integrantes" for="integrante-foto-0">

                                        <span class="imagem-display">&#65291;</span>

                                    </label>

                                    <input type="file" id="integrante-foto-0" class="input-file" name="integrantes[0][foto]" accept=".jpg,.jpeg,.png,.gif" multiple>
                                    
                                    <x-input-error class="mt-2" :messages="$errors->get('integrantes.0.foto')"/>
                               
                                </div>

                                <div class="form-group">

                                    <label for="integrante-nome-0">Nome do Integrante</label>

                                    <input type="text" id="integrante-nome-0" name="integrantes[0][nome]" required>

                                    <x-input-error class="mt-2" :messages="$errors->get('integrantes.0.nome')"/>

                                </div>

                                <div class="turma-ano">

                                    <div class="input-box-select-turma">
                                        
                                        <label for="integrantes-turma-0">Turma</label>

                                        <select name="integrantes[0][turma]" class="block mt-1 w-full" required>

                                            @foreach($turmas as $turma)

                                                <option value="{{ $turma }}">{{ $turma }}</option>
                                                
                                            @endforeach
                                            
                                        </select>

                                    </div>

                                    <div class="input-box-select-ano">
                                        
                                        <label for="integrantes-ano-serie-0">Ano Série</label>

                                        <select name="integrantes[0][anoSerie]" class="block mt-1 w-full" required>

                                            @foreach($anoSeries as $anoSerie)

                                                <option value="{{ $anoSerie }}">{{ $anoSerie }}</option>

                                            @endforeach

                                        </select>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="integrante-funcao">Função do Integrante</label>

                                    <input type="text" id="integrante-funcao-0" name="integrantes[0][funcao]" required>

                                    <x-input-error class="mt-2" :messages="$errors->get('integrantes.0.funcao')"/>

                                </div>

                                <div class="input-box-rede-social">

                                    <label for="integrante-redeSocial-0">Rede Principal do Integrante</label>

                                    <select id="integrante-redeSocial-0" class="block mt-1 w-full" name="integrantes[0][redeSocial]">

                                        <option value="" disabled selected>Selecione uma rede social</option>

                                        <option value="Facebook">Facebook</option>
                                        <option value="Instagram">Instagram</option>
                                        <option value="Twitter">Twitter</option>
                                        <option value="LinkedIn">LinkedIn</option>
                                        <option value="WhatsApp">WhatsApp</option>
                                        <option value="TikTok">TikTok</option>
                                        <option value="Pinterest">Pinterest</option>
                                        <option value="YouTube">YouTube</option>

                                    </select>

                                    <x-input-error class="mt-2" :messages="$errors->get('integrantes.0.redeSocial')"/>

                                </div> 

                                <div class="form-group" id="input-rede-social" style="display: none; text-align: center;">

                                    <label for="integrante-linkRedeSocial-0">Link direto para a rede social</label>

                                    <input type="text" id="integrante-linkRedeSocial-0" name="integrantes[0][linkRedeSocial]">

                                    <p style="font-size: 10px; color:gray;">Caso seja selecionado WhatsApp, coloque apenas o número do integrante</p>

                                    <x-input-error class="mt-2" :messages="$errors->get('integrantes.0.linkRedeSocial')"/>

                                </div>

                                <div class="form-group-color">

                                    <label for="integrante-cor-0">Cor do Integrante</label>

                                    <input class="integrante-cor" type="color" class="input-integrante-cor" id="integrante-cor-0" name="integrantes[0][cor]" required>

                                    <x-input-error class="mt-2" :messages="$errors->get('integrantes.0.cor')"/>

                                </div>

                            </div>

                        @endif
                        
                    </div>

                    <button type="button" class="btn btn-secondary" id="add-integrante-btn">Adicionar Integrante</button>

                </div>

                <div class="criar-grupo" id="criar-grupo-horarios">

                    <label for="horarios-ensaio">Horários que Geralmente Ensaiam (Opcional):</label>
                    
                    <x-text-input maxlength="70" value="{{ old('horarios-ensaio') }}" type="text" class="horarios-ensaio" name="horarios-ensaio" placeholder="Ex.: às 14hrs até às 16hrs..."/>
                    
                    <x-input-error class="mt-2" :messages="$errors->get('horarios-ensaio')"/>

                </div>
                
                <div class="botoes">

                    <button type="submit" class="btn btn-success" style="margin-right:30px; padding:10px; width:8em;">Salvar</button>

                    <a href="{{ route('gruposmusicais.inicio-grupos')}}" class="btn btn-danger" style="padding:10px; width:8em;">Cancelar</a>

                </div>
                    
            </form>
           
        </div>
        
    </div>

    @include('footer.footer')

</x-app-layout>


<style>

	*{

		text-decoration: none !important;

	}

	.main{

		background-color: #ffdede !important;

	}
	
	.container-principal{

		background-color: white;
		border-radius: 10px;
		border:3px solid #f8b4f5;
		width: 100em;
        margin-bottom: 20em;

	}

	.lead{

		position: relative;
		border-bottom: 2px solid #f8b4f5;
		padding: 30px;
        margin-left: -0.58em;
		width: 65.8em;
		text-align: center;
		justify-content: center;
		border-top-right-radius: 6px;
		border-top-left-radius: 6px;
		background-color: #f8b4f5;

	}

    .fotos-grupo{

        display: grid;
        justify-content: center;
        border-bottom: 2px solid #f8b4f5;
        margin-bottom: 5em;

    }

    .fotos-grupo h2{

        text-align: center;
        margin-top: 1em;
        margin-bottom: -1em;

    }

    .input-file {

        display: none !important;

    }

    .botao-adicionar-foto{

        margin-top: 3em;
        justify-self: center;
        width: 13em;
        padding: 10px;
        margin-bottom: 3em;

    }

    .botao-deletar-foto{

        margin-top: -2em;
        margin-left: 47.25em;

    }

    .imagem {

        margin-top: 4em;
        width: 60em;
        height: 30em;
        max-width: 50em;
        max-height: max-content;
        border-radius: 10px;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #5a005a8e;
        border: 2px dashed currentcolor;
        cursor: pointer;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;

    }

    .imagem-integrantes{

        margin-left: 6.8em;
        width: 13em;
        height: 13em;
        max-width: 13em;
        max-height: 13em;
        border-radius: 10px;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #f0d3f06e;
        border-radius: 50%;
        border: 2px dashed currentcolor;
        cursor: pointer;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;

    }

    .imagem:hover, .imagem-integrantes:hover{

        color: #777;
        background: #ccc;

    }

    .imagem:active, .imagem-integrantes:active{

        border-color: #e6c3e6;
        color: #f0acf0;
        background: #eee;

    }

    .imagem:focus, .imagem-integrantes:focus{

        color: #777;
        background: #ccc;
        box-shadow: 0 0 10px rgba(0, 48, 8, 0.397);

    }

    .imagem-display,.imagem-display-integrante{

        font-size: 70px; 
        max-width: 100%;
        max-height: 100%;

    }

    .criar-grupo{

        padding:30px;
		text-align: center;
		font-size: 30px;
		font-weight: 500;
		display: grid;
        border-bottom: 2px solid #e6c3e6;

    }

    .criar-grupo label{

        margin-bottom: 1em;

    }

    .nome-grupo, .horarios-ensaio{

        border: 2px solid #e6c3e6;
        border-radius: 10px;
        background-color: #f8f8f8;
        width: 70%;
        justify-self: center;
        margin-bottom: 3em;

    }

    .horarios-ensaio{

        width: 50%;

    }

    .nome-grupo:focus, .horarios-ensaio:focus {

        outline: none !important;
        border:2px solid #f8b4f5;
        box-shadow: 0 0 10px #ce71ba;

    }

    .integrantes-grupo{

        display: grid;
        justify-content: center;
        margin-top: 2em;
        border-bottom: 2px solid #f8b4f5;

    }

    .integrantes{

        width: 25em !important;
        max-width: 25em;
        border-radius: 10px;
        background-color: #ccc;
        margin-left: 1.3em;
        margin-top: 2em;
        margin-bottom: 3em;

    }

    .integrantes label{

        color:black;

    }
    
    .form-group-color{

        justify-content: center;
        display: grid;
        padding: 10px;
        margin-right: -1.5em;

    }

    input[type="color"]{

        width: 10em;
        border: 2px solid rgba(0, 0, 0, 0.521);
        margin-top: 0.6em;
        margin-left: -0.7em;

    }
    
    .imagem-integrante{

        padding-top: 2em;
        padding-bottom: 2em;
        border-bottom: 3px solid #0000001f;

    }

    .form-group{

        display: grid;
        margin-top: 2em;
        margin-left: 1em;
        margin-bottom: 2em;

    }

    .form-group label, .form-group-color label{

        font-weight: 500;
        text-align: center;

    }

    .form-group input{

        border: 2px solid #e0dbe02a;
        border-radius: 10px;
        background-color: #f8f8f8;
        width: max-content;
        height: max-content;
        justify-self: center;
        margin-bottom: 1em;

    }

    .form-group input:focus{

        outline: none !important;
        border:2px solid #fffdff96;
        box-shadow: 0 0 10px #fffdff96;

    }

    #add-integrante-btn{

        width: 14em;
        justify-self: center;
        margin-bottom: 3em;
        padding: 10px;

    }

    .botao-deletar-integrante-foto{

        margin-left: 22.3em;
        margin-top: -37.7em;

    }
    

    .botoes{

        text-align: center;
        margin-bottom: 3em;

    }

    textarea{

        width: 100%;
        height: 150px;
        padding: 10px 20px;
        box-sizing: border-box;
        border: 2px solid #f8b4f5;
        border-radius: 10px;
        background-color: #f8f8f8;
        font-size: 16px;
        resize: none;
        margin-bottom: 3em;

    }

    textarea:focus {

        outline: none !important;
        border:2px solid #f8b4f5;
        box-shadow: 0 0 10px #ce71ba;

    }

    #criar-grupo-horarios{

        border: none;

    }

    .turma-ano{

        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .input-box-select-ano select, .input-box-select-turma select, .input-box-rede-social select{

        border-radius: 10px;
        width: 7.5em;
        background-color: #0000001f;

    }

    .input-box-select-turma select{

        width: 15em;

    }

    .input-box-rede-social{

        display: grid;
        justify-content: center;
        margin-bottom:2em;

    }

    .input-box-rede-social select{

        width:18em;

    }

    .limite-caracteres{

        position: absolute;
        font-size: 12px;
        color: grey;
		margin-top: 17.2em;
		margin-left: 100em;

    }

    @media (min-width: 7680px) {

        .personalizacao-footer{

            margin-top: 6.5em;

        }

    }

    @media (min-width: 1400px) and (max-width: 1599px) {

        .lead{

            width: 66em;
            margin-left: -0.7em;

        }

    }

    @media (min-width: 1200px) and (max-width: 1499px) {

        .lead{

            width: 56.9em;
            margin-left: -0.7em;

        }

        .limite-caracteres{

            margin-left: 85em;

        }

    }

    @media (min-width: 1050px) and (max-width: 1199px) {

        .lead{

            width: 47.9em;
            margin-left: -0.7em;

        }

        .limite-caracteres{

            margin-left: 69.8em;

        }

    }

    @media (min-width: 900px) and (max-width: 1049px) {

        .lead{

            width: 35.8em;
            margin-left: -0.7em;

        }

        .imagem{

            width: 38em;
            height: 30em;

        }

        .limite-caracteres{

            margin-left: 50em;

        }

        .botao-deletar-foto{

            margin-left: 35.24em;
            margin-top: -2em;

        }

    }

    @media (min-width: 750px) and (max-width: 899px) {

        .lead{

            width: 35.9em;
            margin-left: -0.7em;

        }

        .imagem{

            width: 38em;
            height: 22em;

        }

        .limite-caracteres{

            margin-left: 50em;

        }

        .botao-deletar-foto{

            margin-left: 35.27em;
            margin-top: -1.98em;

        }

    }

    @media (min-width: 600px) and (max-width: 659px) {

        .lead{

            width: 26.9em;
            margin-left: -0.7em;

        }

        .imagem{

            width: 30em;
            height: 19em;

        }

        .limite-caracteres{

            margin-top: 21em;
            margin-left: 35em;

        }

        .botao-deletar-foto{

            margin-left: 27.24em;
            margin-top: -2em;

        }

    }

    @media (min-width: 450px) and (max-width: 539px) {

        .container-principal{

            width: 26em;
        
        }

        .lead{

            width: 20.7em;
            margin-left: -0.7em;

        }

        .imagem{

            width: 23em;
            height: 14em;

        }

        .integrantes{

            margin-left: 0.8em;
            width: 22em !important;
            max-width: 22em;

        }

        .imagem-integrantes{

            margin-left: 4.5em;

        }
        
        .input-box-select-turma select{

            width: 12em;

        }

        .botao-deletar-integrante-foto{

            margin-left: 19.3em;

        }

        .limite-caracteres{

            margin-top: 21em;
            margin-left: 24.8em;

        }

        .botao-deletar-foto{

            margin-left: 20.25em;
            margin-top: -2em;

        }

    }

    @media (min-width: 300px) and (max-width: 449px) {

        .container-principal{

            width: 20.5em;

        }
        .lead{

            width: 16.2em;
            margin-left: -0.7em;

        }

        .imagem{

            width: 17em;
            height: 12em;

        }

        .integrantes{

            margin-left: 0.3em;
            width: 18em !important;
            max-width: 22em;

        }

        .imagem-integrantes{

            margin-left: 3em;

        }

        .input-box-select-turma select{

            width: 9em;

        }

        .botao-deletar-integrante-foto{

            margin-left: 15.3em;

        }

        .limite-caracteres{

            margin-top: 24.6em;
            margin-left: 17.4em;

        }

        .botao-deletar-foto{

            margin-left: 14.25em;
            margin-top: -2em;

        }

    }

</style>

<script>

    function addFileInputEventListener(inputFile, pictureImage) 
    {

        inputFile.addEventListener("change", function (e) 
        {

            const inputTarget = e.target;
            const file = inputTarget.files[0];

            if (file) 
            {

                const reader = new FileReader();
                reader.addEventListener("load", function (e) 
                {

                    const readerTarget = e.target;
                    const img = document.createElement("img");
                    img.src = readerTarget.result;
                    img.classList.add("imagem-display");
                    pictureImage.innerHTML = "";
                    pictureImage.appendChild(img);

                });

                reader.readAsDataURL(file);

            } 
            else 
            {

                pictureImage.innerHTML = "&#65291;";

            }

        });

    }

    document.querySelectorAll('.input-file').forEach((inputFile, index) => 
    {

        const pictureImage = document.querySelectorAll('.imagem-display')[index];
        addFileInputEventListener(inputFile, pictureImage);

    });

    document.getElementById('add-foto-btn').addEventListener('click', function() 
    {

        var container = document.getElementById('imagem-input');
        var novoInput = document.createElement('div');
        var index = container.children.length + 1;
        const pictureImageTxt = "&#65291";

        novoInput.className = 'fotos';
        novoInput.innerHTML = 

            '<label class="imagem" for="input-file-' + index + '"> <span class="imagem-display">' + pictureImageTxt + '</span> </label>' +

            '<div class="input-grupos-adicionar" id="input-grupos-adicionar-' + index + '">' +

                '<input type="file" id="input-file-' + index + '" class="input-file" name="foto-grupo[]" accept=".jpg,.jpeg,.png,.gif">' +
                
                '<button type="button" class="botao-deletar-foto btn btn-danger" onclick="removeInput(this)">'+
                    
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">'+
                        '<path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>'+
                    '</svg>'+
                
                '</button>'+

            '</div>';

        container.appendChild(novoInput);

        const inputFile = novoInput.querySelector("input[type='file']");
        const pictureImage = novoInput.querySelector(".imagem-display");
        addFileInputEventListener(inputFile, pictureImage);

    });

    function removeInput(button) 
    {

        var container = button.parentElement.parentElement;
        container.parentNode.removeChild(container);

    }

    document.getElementById('add-integrante-btn').addEventListener('click', function() 
    {

        var container = document.getElementById('integrantes-grupo-input');
        var novaDivIntegrante = document.createElement('div');
        var index = container.children.length;
        const pictureImageTxt = "&#65291";

        novaDivIntegrante.id = 'integrante-cor-display-' + index; 
        novaDivIntegrante.className = 'integrantes';
        novaDivIntegrante.innerHTML = 

            '<div class="adicionar-input-integrante">'+

                '<div class="imagem-integrante">'+

                    '<label class="imagem-integrantes" for="integrante-foto-' + index + '"> <span class="imagem-display">' + pictureImageTxt + '</span> </label>' +
                        
                    '<input type="file" class="input-file" id="integrante-foto-' + index + '" name="integrantes[' + index + '][foto]" accept=".jpg,.jpeg,.png,.gif">'+

                    '<x-input-error class="mt-2" :messages="$errors->get("integrantes."'+ index +'".foto")"/>'+

                '</div>'+

                
                '<div class="form-group">'+
                    
                    '<label for="integrante-nome-' + index + '">Nome do Integrante</label>'+
                    
                    '<input type="text" class="input-integrante" id="integrante-nome-' + index + '" name="integrantes[' + index + '][nome]" required>'+
                
                    '<x-input-error class="mt-2" :messages="$errors->get("integrantes".'+ index +'."nome")"/>'+

                '</div>'+

                '<div class="turma-ano">'+

                    '<div class="input-box-select-turma">'+
                        
                        '<label for="integrantes-turma-' + index + '">Turma</label>'+

                        '<select name="integrantes[' + index + '][turma]" class="block mt-1 w-full">'+

                            '@foreach($turmas as $turma)'+

                                '<option value="{{ $turma }}">{{ $turma }}</option>'+
                                
                            '@endforeach'+
                            
                        '</select>'+

                        '<x-input-error class="mt-2" :messages="$errors->get("integrantes".'+ index +'."turma")"/>'+

                    '</div>'+

                    '<div class="input-box-select-ano">'+
                        
                        '<label for="integrantes-ano-serie-' + index + '" >Ano Série</label>'+

                        '<select name="integrantes[' + index + '][anoSerie]" class="block mt-1 w-full">'+

                           '@foreach($anoSeries as $anoSerie)'+

                                '<option value="{{ $anoSerie }}">{{ $anoSerie }}</option>'+

                            '@endforeach'+

                        '</select>'+

                        '<x-input-error class="mt-2" :messages="$errors->get("integrantes".'+ index +'."anoSerie")"/>'+

                    '</div>'+

                '</div>'+
                
                '<div class="form-group">'+
                    
                    '<label for="integrante-funcao-' + index + '">Função do Integrante</label>'+
                    '<input type="text" class="input-integrante" id="integrante-funcao-' + index + '" name="integrantes[' + index + '][funcao]" required>'+
                    '<x-input-error class="mt-2" :messages="$errors->get("integrantes".'+ index +'."funcao")"/>'+

                '</div>'+

                '<div class="input-box-rede-social">'+

                    '<label for="integrante-redeSocial-' + index + '">Rede Principal do Integrante</label>'+

                    '<select id="integrante-redeSocial-' + index + '" class="block mt-1 w-full" name="integrantes[' + index + '][redeSocial]">'+

                        '<option value="" disabled selected>Selecione uma rede social</option>'+

                        '<option value="Facebook">Facebook</option>'+
                        '<option value="Instagram">Instagram</option>'+
                        '<option value="Twitter">Twitter</option>'+
                        '<option value="LinkedIn">LinkedIn</option>'+
                        '<option value="WhatsApp">WhatsApp</option>'+
                        '<option value="TikTok">TikTok</option>'+
                        '<option value="Pinterest">Pinterest</option>'+
                        '<option value="YouTube">YouTube</option>'+

                    '</select>'+

                    '<x-input-error class="mt-2" :messages="$errors->get("integrantes."' + index + '".redeSocial")"/>'+

                '</div>'+

                '<div class="form-group" id="input-rede-social" style="display: none; text-align: center;">'+

                    '<label for="integrante-linkRedeSocial-' + index + '">Link direto para a rede social</label>'+

                    '<input type="text" id="integrante-linkRedeSocial-' + index + '" name="integrantes[' + index + '][linkRedeSocial]">'+

                    '<p style="font-size: 10px; color:gray;">Caso seja selecionado WhatsApp, coloque apenas o número do integrante</p>'+

                    '<x-input-error class="mt-2" :messages="$errors->get("integrantes."'+ index +'."linkRedeSocial")"/>'+

                '</div>'+
                
                '<div class="form-group-color">'+
                    
                    '<label for="integrante-cor-' + index + '">Cor do Integrante</label>'+
                    
                    '<input type="color" class="input-integrante-cor" id="integrante-cor-' + index + '" name="integrantes[' + index + '][cor]" required>'+
                
                '</div>'+

                '<button type="button" class="botao-deletar-integrante-foto btn btn-danger" onclick="deletarIntegrante(this)">'+
                    
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2" viewBox="0 0 16 16">'+ 
                        '<path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793"/>'+
                    '</svg>'+

                '</button>'+

            '</div>';

        container.appendChild(novaDivIntegrante);

        const inputFile = novaDivIntegrante.querySelector("input[type='file']");
        const pictureImage = novaDivIntegrante.querySelector(".imagem-display");
        addFileInputEventListener(inputFile, pictureImage);

        const colorPicker = novaDivIntegrante.querySelector("input[type='color']");
        const colorDisplay = novaDivIntegrante;
        addColorPickerEventListener(colorPicker, colorDisplay);

        const redeSocial = novaDivIntegrante.querySelector("select[name='integrantes[" + index + "][redeSocial]']");
        const linkRedeSocialShow = novaDivIntegrante.querySelector("#input-rede-social");

        redeSocial.addEventListener('change', function() 
        {

            if (redeSocial.value !== "") 
            {

                linkRedeSocialShow.style.display = 'block';

            } 
            else 
            {

                linkRedeSocialShow.style.display = 'none';

            }

        });

    });

    function addColorPickerEventListener(colorPicker, colorDisplay) 
    {

        colorPicker.addEventListener("input", function (e) 
        {

            const color = e.target.value;
            const brightness = getColorBrightness(color);
                
            if (brightness < 50) 
            {
                colorDisplay.style.backgroundColor = color;

                colorDisplay.querySelectorAll('label, select').forEach(label => label.style.color = 'white', select => select.style.color = 'white');
                
            } else {

                colorDisplay.style.backgroundColor = color;

                colorDisplay.querySelectorAll('label, select').forEach(label => label.style.color = 'black', select => select.style.color = 'white');

            }

        });

    }

    function getColorBrightness(hex) 
    {

        hex = hex.replace(/^#/, '');
        let r = parseInt(hex.substring(0, 2), 16);
        let g = parseInt(hex.substring(2, 4), 16);
        let b = parseInt(hex.substring(4, 6), 16);
        return (r * 299 + g * 587 + b * 114) / 1000;

    }

    document.querySelectorAll("input[type='color']").forEach((colorPicker, index) => 
    {

        const colorDisplay = document.querySelectorAll('.integrantes')[index];
        addColorPickerEventListener(colorPicker, colorDisplay);

    });

    function deletarIntegrante(button) 
    {

        var container = button.parentElement.parentElement;
        container.parentNode.removeChild(container);

    }

    const textarea = document.getElementById('informacao-grupo');
    const charCount = document.getElementById('limite-caracteres');
    const maxLength = textarea.getAttribute('maxlength');

    textarea.addEventListener('input', function() 
	{

        const remaining = maxLength - textarea.value.length;
        charCount.textContent = remaining;

    });

    document.addEventListener('DOMContentLoaded', function () 
    {

        var redeSocial = document.getElementById('integrante-redeSocial-0');
        var inputRedeSocialShow = document.getElementById('input-rede-social');

        redeSocial.addEventListener('change', function () {

            if (redeSocial.value !== "") 
            {

                inputRedeSocialShow.style.display = 'block';

            } 
            else 
            {

                inputRedeSocialShow.style.display = 'none';

            }

        });

    });

</script>