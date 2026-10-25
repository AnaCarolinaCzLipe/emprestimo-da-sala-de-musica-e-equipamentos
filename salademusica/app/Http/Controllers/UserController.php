<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Events\PenalizacaoExpirada;
use App\Models\HistoricoSolicitacao;

class UserController extends Controller
{
    
    // dd($pe)
    
    public function penalizacaoUsuario(Request $request, $userId)
    {

        $user = User::findOrFail($userId);

        if ($user->penalizado) 
        {
            return back()->with('error', 'Este usuário já está penalizado.');
        }

        $request->validate([

            'motivo-penalizacao' => 'required|string|max:300',

        ]);

        $motivoPenalizacao = $request->input('motivo-penalizacao');

        $penalizacao = $request->input('penalizacao');

        switch ($penalizacao) 
        {
            case '1dia':

                $penalizacaoTempo = Carbon::now()->addDays(1);

            break;

            case '2dias':

                $penalizacaoTempo = Carbon::now()->addDays(2);

            break;

            case '3dias':

                $penalizacaoTempo = Carbon::now()->addDays(3);
            break;

            case '1semana':

                $penalizacaoTempo = Carbon::now()->addWeek();
            break;

            case '2semanas':

                $penalizacaoTempo = Carbon::now()->addWeeks(2);

            break;

            case '1mes':

                $penalizacaoTempo = Carbon::now()->addMonth();
            
            break;

        }

        $user->penalizado = true;
        $user->penalizacao_tempo = $penalizacaoTempo;

        $user->save();

        HistoricoSolicitacao::create([

            'user_id' => $user->id,
            'tipo' => 'Penalizacao',
            'status' => 'Penalizado',
            'penalizado_historico' => true,
            'penalizacao_tempo_historico' => $penalizacaoTempo,
            'motivo_penalizacao' => $motivoPenalizacao,
            'created_at' => now(),

        ]);

        event(new PenalizacaoExpirada($user));

        return back()->with('success', 'Usuário penalizado com sucesso até ' . $penalizacaoTempo->toDateString());

    }

    public function removerPenalizacao($userId)
    {

        $user = User::findOrFail($userId);

        if (!$user->penalizado) 
        {

            return back()->with('error', 'Este usuário não está penalizado.');

        }

        $user->penalizado = false;
        $user->penalizacao_tempo = null;
        $user->save();

        return back()->with('success', 'Penalização removida com sucesso.');

    }

}