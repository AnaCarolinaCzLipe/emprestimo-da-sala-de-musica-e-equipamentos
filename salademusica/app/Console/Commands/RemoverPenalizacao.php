<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class RemoverPenalizacao extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'penalization:update-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza o status de penalização dos usuários quando o tempo expira';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        DB::table('users')
            ->where('penalizado', 1)
            ->where('penalizacao_tempo', '<=', Carbon::now())
            ->update([
                'penalizado' => 0,
                'penalizacao_tempo' => null,
            ]);

        $this->info('Status de penalização atualizado.');

    }
}
