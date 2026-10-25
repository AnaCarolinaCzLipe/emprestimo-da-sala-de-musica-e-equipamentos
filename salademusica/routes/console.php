<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    DB::table('users')
        ->where('penalizado', 1)
        ->where('penalizacao_tempo', '<=', Carbon::now())
        ->update([
            'penalizado' => 0,
            'penalizacao_tempo' => null,
        ]);
})->everyMinute();