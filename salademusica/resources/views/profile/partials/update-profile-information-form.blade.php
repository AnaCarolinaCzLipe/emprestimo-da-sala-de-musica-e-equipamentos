<section>

    <header>

        <h2 style="display: flex; gap:10px;">

            {{ __('Informações do Usuário') }}

            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
            </svg>

        </h2>

        <p class="mt-1 text-sm text-gray-600">

            {{ __("As informações básicas da sua conta podem ser mudadas por aqui.") }}

        </p>

    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">

        @csrf

    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        @if(isset($user))

        <div>

            <x-input-label for="nome" :value="__('Nome:')"/>

            <x-text-input maxlength="50" id="nome" name="nome" type="text" class="input-informacoes-basica mt-4 block w-full" :value="old('nome', $user->nome)" required autofocus autocomplete="name" />

            <x-input-error class="mt-2" :messages="$errors->get('nome')"/>

        </div>  
        
        <div style="position: relative;">

            <x-input-label for="email" :value="__('Email:')"/>

            <x-text-input id="email" name="email" type="email" class="input-informacoes-basica mt-4 block w-full" :value="old('email', $user->email)" required autocomplete="username" />

            <x-input-error class="mt-2" :messages="$errors->get('email')"/>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div class="verificacao-email">

                    <p class="text-sm mt-2 text-gray-800">

                        {{ __('Seu email não foi verificado ainda;') }}


                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                            {{ __('Clique aqui para reenviar a verificação de email.') }}

                        </button>

                    </p>

                </div>

            @endif

        </div>

        <div>
            
            <x-input-label for="matricula" :value="__('Matrícula:')"/>

            <x-text-input maxlength="11" id="matricula" name="matricula" type="text" class="input-informacoes-basica mt-4 block w-full" :value="old('matricula', $user->matricula)" required autofocus autocomplete="username"/>

            <x-input-error class="mt-2" :messages="$errors->get('matricula')"/>

        </div>

        <div class="hidden">

            <x-input-label for="turma" :value="__('Turma')" />
            <x-text-input id="turma" name="turma" type="text" class="mt-4 block w-full" :value="old('turma', $user->turma)" required autofocus autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('turma')" />
                
        </div>


        <div class="flex items-center gap-4">

            <button class="btn btn-success botao-salvar">Salvar</button>

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

    </form>

    @else

        <p>Usuário não existe.</p>

    @endif

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

    .input-informacoes-basica{

		border: 2px solid #c3e6c8;
        background-color: #f8f8f8;
        border-radius: 20px;

    }

    .input-informacoes-basica:focus {

        outline: none !important;
        border:2px solid rgba(0, 255, 0, 0.603);
        box-shadow: 0 0 10px #71ce85;

    }

    .verificacao-email{

        margin-bottom: 3em;

    }

    .verificacao-email p{

        margin-right: -33em;
        width: max-content;

    }


</style>
