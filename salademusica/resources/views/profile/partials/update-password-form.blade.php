<section>

    <header>

        <h2 style="display: flex; gap:10px;">

            {{ __('Atualizar Senha') }}

            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
            </svg>

        </h2>

        <p class="mt-1 text-sm text-gray-600">

            {{ __('Por favor, utilize uma senha forte e única para a sua própria segurança.') }}

        </p>

    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>

            <x-input-label for="update_password_current_password" :value="__('Senha Atual')" />

            <x-text-input id="update_password_current_password" name="current_password" type="password" class="input-senha mt-1 block w-full" autocomplete="current-password" />

            <img class="imagem-olho" id="icone-olho-fechado-senha-atual" src="\assets\images\olho-fechado.svg" style="display: none;" onclick="mostrarSenha('update_password_current_password', 'icone-olho-aberto-senha-atual', 'icone-olho-fechado-senha-atual')"/>

            <img class="imagem-olho" id="icone-olho-aberto-senha-atual" src="\assets\images\olho-aberto.svg" onclick="mostrarSenha('update_password_current_password', 'icone-olho-aberto-senha-atual', 'icone-olho-fechado-senha-atual')"/>

            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />

        </div>

        <div>

            <x-input-label for="update_password_password" :value="__('Nova Senha')" />

            <x-text-input id="update_password_password" name="password" type="password" class="input-senha mt-1 block w-full" autocomplete="new-password" />

            <img class="imagem-olho" id="icone-olho-fechado-nova-senha" src="\assets\images\olho-fechado.svg" style="display: none;" onclick="mostrarSenha('update_password_password', 'icone-olho-aberto-nova-senha', 'icone-olho-fechado-nova-senha')"/>

            <img class="imagem-olho" id="icone-olho-aberto-nova-senha" src="\assets\images\olho-aberto.svg" onclick="mostrarSenha('update_password_password', 'icone-olho-aberto-nova-senha', 'icone-olho-fechado-nova-senha')"/>

            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />

        </div>

        <div>

            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Nova Senha')" />

            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="input-senha mt-1 block w-full" autocomplete="new-password" />

            <img class="imagem-olho" id="icone-olho-fechado-confirmar-senha" src="\assets\images\olho-fechado.svg" style="display: none;" onclick="mostrarSenha('update_password_password_confirmation', 'icone-olho-aberto-confirmar-senha', 'icone-olho-fechado-confirmar-senha')"/>

            <img class="imagem-olho" id="icone-olho-aberto-confirmar-senha" src="\assets\images\olho-aberto.svg" onclick="mostrarSenha('update_password_password_confirmation', 'icone-olho-aberto-confirmar-senha', 'icone-olho-fechado-confirmar-senha')"/>
            
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />

        </div>

        <div class="flex items-center gap-4">

            <button class="btn btn-success botao-salvar">{{ __('Salvar') }}</button>

            @if (session('status') === 'password-updated')

                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Salvo.') }}</p>

            @endif

        </div>

    </form>
    
</section>

<style>

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

    .input-senha{

        border: 2px solid #c3e6c8;
        background-color: #f8f8f8;
        border-radius: 20px;

    }

    .input-senha:focus {

        outline: none !important;
        border:2px solid rgba(0, 255, 0, 0.603);
        box-shadow: 0 0 10px #71ce85;

    }

</style>

<script>

    function mostrarSenha(inputId, iconeFechadoId, iconeAbertoId) 
    {

        var inputSenha = document.getElementById(inputId);
        var iconeOlhoFechado = document.getElementById(iconeFechadoId);
        var iconeOlhoAberto = document.getElementById(iconeAbertoId);

        if (inputSenha.type === 'password') 
        {

            inputSenha.type = 'text';
            iconeOlhoFechado.style.display = 'none';
            iconeOlhoAberto.style.display = 'inline-block';

        } 
        else 
        {
            
            inputSenha.type = 'password';
            iconeOlhoFechado.style.display = 'inline-block';
            iconeOlhoAberto.style.display = 'none'

        }

    }

</script>