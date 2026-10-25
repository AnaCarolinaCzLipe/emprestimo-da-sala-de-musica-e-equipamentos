<?php

namespace App\Listeners;

use App\Events\PenalizacaoExpirada;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RemovePenalizacao implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  PenalizacaoExpirada  $event
     * @return void
     */

    public function handle(PenalizacaoExpirada $event)
    {
        $user = $event->user;
        
        $user->update([
            'penalizado' => false,
            'penalizacao_tempo' => null,
        ]);
        
    }

}