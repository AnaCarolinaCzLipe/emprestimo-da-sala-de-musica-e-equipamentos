<section class="space-y-6">

    <header>

        <h2 style="display: flex; gap:10px">

            {{ __('Excluir Conta') }}

            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
            </svg>

        </h2>

        <p class="mt-1 text-sm text-gray-600">

            {{ __('Após a exclusão da conta, lembre-se que todos os seus dados serão apagados') }}<b> permanentemente.</b>

        </p>

    </header>

    <x-danger-button class="excluir-conta-botao"

        x-data=""

        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"

    >{{ __('Excluir') }}</x-danger-button>

    <p style="margin-bottom: 2em;"> </p>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">

                {{ __('Você tem certeza que deseja prosseguir com a exclusão da sua conta?') }}

            </h2>

            <p class="mt-1 text-sm text-gray-600">

                {{ __('Os dados serão apagados para sempre. Por favor, insira sua senha se deseja continuar com o progresso.') }}

            </p>

            <div class="mt-6">

                <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />

                <x-text-input

                    id="password"
                    name="password"
                    type="password"
                    class="input-senha mt-1 block w-3/4"
                    placeholder="{{ __('Senha') }}"

                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />

            </div>

            <div class="mt-6 flex justify-end">

                <x-secondary-button x-on:click="$dispatch('close')">

                    {{ __('Cancelar') }}

                </x-secondary-button>

                <x-danger-button class="ms-3">

                    {{ __('Excluir Conta') }}

                </x-danger-button>

            </div>

        </form>

    </x-modal>
    
</section>


<style>

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