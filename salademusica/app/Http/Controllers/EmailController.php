<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificacaoEmailDevolucaoChave;
use App\Models\User;
use App\Models\EmprestimoChave;

class EmailController extends Controller
{

    // Equipamento

    public function enviarEmailConfirmacaoDevolucaoEquipamento(Request $request)
    {
        $usuarios = User::where('role', 'Admin')
                        ->orWhere('role', 'Controlador')
                        ->get();

        $emails = $usuarios->pluck('email')->toArray();

        $solicitacoesequipamentos = Solicitacao::whereIn('status', ['Em Posse'])->get();

        $emailsChunked = array_chunk($emails, 20);

        foreach ($emails as $email) {

            Mail::to($email)->send(new NotificacaoEmailDevolucaoEquipamento($solicitacoesequipamentos));

        }

        return redirect()->back();

    }
    
    // Chave

    public function enviarEmailConfirmacaoDevolucaoChave(Request $request)
    {

        $usuarios = User::where('role', 'Admin')
        ->orWhere('role', 'Controlador')
        ->get();

        $solicitacoesChaves = EmprestimoChave::whereIn('status', ['Em Posse'])->get();

        foreach ($usuarios as $usuario) 
        {

            Mail::to($usuario->email)->send(new NotificacaoEmailDevolucaoChave($usuario, $solicitacoesChaves));

        }

        return redirect()->back();

    }
    
}
