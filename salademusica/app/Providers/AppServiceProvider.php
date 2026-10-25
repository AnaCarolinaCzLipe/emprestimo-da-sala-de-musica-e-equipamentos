<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Events\PenalizacaoExpirada;
use App\Listeners\RemovePenalizacao;
use Illuminate\Support\Facades\Event;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(
            PenalizacaoExpirada::class,
            RemovePenalizacao::class
        );

        Carbon::setLocale('pt_BR');

    }

}
