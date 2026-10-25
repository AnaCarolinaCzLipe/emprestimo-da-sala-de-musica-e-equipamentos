<section>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <header>

        <h2 style="display: flex; gap:10px;">

            {{ __('Foto de Perfil') }}

            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-camera" viewBox="0 0 16 16">
                <path d="M15 12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h1.172a3 3 0 0 0 2.12-.879l.83-.828A1 1 0 0 1 6.827 3h2.344a1 1 0 0 1 .707.293l.828.828A3 3 0 0 0 12.828 5H14a1 1 0 0 1 1 1zM2 4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.172a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 9.172 2H6.828a2 2 0 0 0-1.414.586l-.828.828A2 2 0 0 1 3.172 4z"/>
                <path d="M8 11a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5m0 1a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7M3 6.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
              </svg>

        </h2>

    </header>

    <form method="post" action="{{ route('profile.gerenciarFotoPerfil', $user->id) }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        @if(isset($user))

            <div class="imagem-input">

                <x-input-label class="imagem" for="input-file" tabIndex="0">

                    <span class="imagem-display"></span>

                </x-input-label>

                <x-text-input id="input-file" name="imagem" type="file" :value="old('imagem', $user->imagem)" required autofocus autocomplete="imagem"/>
                                        
                <x-input-error class="mt-2" :messages="$errors->get('imagem')" />

                <p class="arquivos">Formatos aceitos:jpeg,png,jpg,gif,svg.</p>

            </div>

            <div class="flex items-center gap-4">

                <button type="submit" class="btn btn-success botao-salvar">{{ __('Salvar') }}</button>
    
                @if (session('status') === 'profile-updated')
    
                    <p
    
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600"
    
                    >{{ __('Salvo.') }}</p>
                    
                @endif
    
            </div>
    @else

        <p> Usuário não existe</p>

    @endif

    </form>

    <div class="excluir-foto">

        <form method="post" action="{{ route('profile.deletarFotoPerfil', $user->id) }}">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger botao-excluir-foto" type="submit">Deletar Foto Atual</button>

        </form>

    </div>

</section>


<style>

    #input-file {

        display: none;

    }

    .mt-2{

        position: absolute;
        top: 10em;
        right: 38.5em;
        width: 20em;

    }

    .imagem {

        width: 20em;
        height: 20em;
        border-radius: 10px;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #075300a4;
        border: 2px dashed currentcolor;
        cursor: pointer;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;
        
    }

    .imagem:hover {

        color: #777;
        background: #ccc;

    }

    .imagem:active {

        border-color: rgb(0, 90, 12);
        color: rgb(69, 224, 64);
        background: #eee;

    }

    .imagem:focus {

        color: #777;
        background: #ccc;
        box-shadow: 0 0 10px rgba(0, 48, 8, 0.397);

    }

    .imagem-display {

        font-size: 70px; 
        max-width: 100%;
    
    }

    .botao-salvar{

        color: white;
        font-weight: 500;
        background-color: green;

    }

    .botao-salvar:hover{
    
        color: white;
        font-weight: 500;
        background-color: rgb(0, 105, 0);
    
    }
    
    .arquivos{

        margin-right: 27em;

    }

</style>


<script>

    const inputFile = document.querySelector("#input-file");
    const pictureImage = document.querySelector(".imagem-display");
    const pictureImageTxt = "&#65291";
    pictureImage.innerHTML = pictureImageTxt;

    inputFile.addEventListener("change", function (e) {

        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if (file) {

            const reader = new FileReader();

            reader.addEventListener("load", function (e) {

                const readerTarget = e.target;

                const img = document.createElement("img");
                img.src = readerTarget.result;
                img.classList.add("imagem-display");

                pictureImage.innerHTML = "";
                pictureImage.appendChild(img);

            });

            reader.readAsDataURL(file);

        } else {

            pictureImage.innerHTML = pictureImageTxt;

        }
    });


    // https://www.youtube.com/watch?v=gXXmQeZOHKY, créditos à Otávio Miranda //

</script>