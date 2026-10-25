<x-mail::message>

@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Algo deu errado!')
@else
# @lang('Verificação/Solicitação da Conta')
@endif
@endif

<p> Nós estamos enviando este email pois você solicitou alguma verificação/solicitação em sua conta.</p>

<p> Clique neste botão que iremos lhe direcionar para uma outra página para verificar a situação.</p>

<p> O link irá expirar em torno de 1 hora. Por favor, lembre-se disto.</p>

<p> Caso não tenha sido você, recomendamos que troque sua senha, ou simplesmente ignore está mensagem</p>

@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">

    {{ __('Verificar') }}

</x-mail::button>
@endisset

@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Atenciosamente'),<br>
<p> Gerenciador do site da Sala de Música. IFPR.</p>
@endif

<p> Em caso de dúvidas, por favor comunicar conosco.</p>

@isset($actionText)
<x-slot:subcopy>
@lang(
        "Problemas ao ser direcionado pelo botão? Clique no link para ser direcionado direto\n".
        'para o nosso site.',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>
