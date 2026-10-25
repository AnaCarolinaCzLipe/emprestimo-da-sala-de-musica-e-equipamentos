<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HistoricoSolicitacao;
use App\Models\Equipamento;

class RelatorioController extends Controller
{
    
    public function relatorioGeral()
    {

        $emprestimoChaveEmPosse = HistoricoSolicitacao::where('tipo', 'EmprestimoChave')->where('status', 'Em Posse')->count();

        $emprestimoChaveConfirmadas = HistoricoSolicitacao::where('tipo', 'EmprestimoChave')->where('status', 'Confirmada')->count();

        $emprestimoChaveRejeitadas = HistoricoSolicitacao::where('tipo', 'EmprestimoChave')->where('status', 'Rejeitada')->count();

        $emprestimoChaveAlteradasRejeitadas = HistoricoSolicitacao::where('tipo', 'EmprestimoChave')->where('status', 'Alterada Rejeitada')->count();

        $emprestimoChaveSolicitacoesCriadas = HistoricoSolicitacao::where('tipo', 'EmprestimoChave')->where('status', 'Solicitação Criada')->count();

        $totalEmprestimoChave = HistoricoSolicitacao::where('tipo', 'EmprestimoChave')->count();

        $emprestimoEquipamentoSolicitacoesCriadas = HistoricoSolicitacao::where('tipo', 'EmprestimoEquipamento')->where('status', 'Solicitação Criada')->count();

        $emprestimoEquipamentoEmPosse = HistoricoSolicitacao::where('tipo', 'EmprestimoEquipamento')->where('status', 'Em Posse')->count();

        $emprestimoEquipamentoRejeitadas = HistoricoSolicitacao::where('tipo', 'EmprestimoEquipamento')->where('status', 'Rejeitada')->count();

        $emprestimoEquipamentoAlteradasRejeitadas = HistoricoSolicitacao::where('tipo', 'EmprestimoEquipamento')->where('status', 'Alterada Rejeitada')->count();

        $totalEmprestimoEquipamento = HistoricoSolicitacao::where('tipo', 'EmprestimoEquipamento')->count();

        $totalPenalizacoes = HistoricoSolicitacao::where('penalizado_historico', 1)->count();

        $totalEquipamentos = Equipamento::count();

        $dadosRelatorioGeral = [

            'emprestimoChave' => [

                'solicitacoes-criadas' => $emprestimoChaveSolicitacoesCriadas,
                'em-posse' => $emprestimoChaveEmPosse,
                'confirmadas' => $emprestimoChaveConfirmadas,
                'alteradas-rejeitadas' => $emprestimoChaveAlteradasRejeitadas,
                'rejeitadas' => $emprestimoChaveRejeitadas,
                'total' => $totalEmprestimoChave,

            ],

            'emprestimoEquipamento' => [

                'solicitacoes-criadas' => $emprestimoEquipamentoSolicitacoesCriadas,
                'em-posse' => $emprestimoEquipamentoEmPosse,
                'rejeitadas' => $emprestimoEquipamentoRejeitadas,
                'alteradas-rejeitadas' => $emprestimoEquipamentoAlteradasRejeitadas,
                'total' => $totalEmprestimoEquipamento,

            ],

            'totalPenalizacoes' => $totalPenalizacoes,

            'totalEquipamentos' => $totalEquipamentos,

        ];

        return $dadosRelatorioGeral;

    }

    public function relatorioUsuario($id)
    {
        $usuario = User::findOrFail($id);
    
        $emprestimoChaveEmPosse = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoChave')->where('status', 'Em Posse')->count();
    
        $emprestimoChaveConfirmadas = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoChave')->where('status', 'Confirmada')->count();
    
        $emprestimoChaveRejeitadas = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoChave')->where('status', 'Rejeitada')->count();
    
        $emprestimoChaveAlteradasRejeitadas = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoChave')->where('status', 'Alterada Rejeitada')->count();
    
        $totalEmprestimoChave = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoChave')->count();
    
        $emprestimoEquipamentoEmPosse = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoEquipamento')->where('status', 'Em Posse')->count();
    
        $emprestimoEquipamentoRejeitadas = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoEquipamento')->where('status', 'Rejeitada')->count();
    
        $emprestimoEquipamentoAlteradasRejeitadas = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoEquipamento')->where('status', 'Alterada Rejeitada')->count();
    
        $totalEmprestimoEquipamento = HistoricoSolicitacao::where('user_id', $id)->where('tipo', 'EmprestimoEquipamento')->count();
    
        $totalPenalizacoes = HistoricoSolicitacao::where('user_id', $id)->where('penalizado_historico', 1)->count();

        $dadosRelatorioUsuario = [

            'user' => $usuario,

            'emprestimoChave' => [

                'em-posse' => $emprestimoChaveEmPosse,
                'confirmadas' => $emprestimoChaveConfirmadas,
                'rejeitadas' => $emprestimoChaveRejeitadas,
                'alteradas-rejeitadas' => $emprestimoChaveAlteradasRejeitadas,
                'total' => $totalEmprestimoChave,

            ],

            'emprestimoEquipamento' => [

                'em-posse' => $emprestimoEquipamentoEmPosse,
                'rejeitadas' => $emprestimoEquipamentoRejeitadas,
                'alteradas-rejeitadas' => $emprestimoEquipamentoAlteradasRejeitadas,
                'total' => $totalEmprestimoEquipamento,

            ],

            'totalPenalizacoes' => $totalPenalizacoes,

        ];
    
        return $dadosRelatorioUsuario;
                
    }

    public function historicoPenalizacoes($id)
    {

        $usuario = User::findOrFail($id);

        $penalizacoes = [

            'penalizado' => $usuario->penalizado,
            'penalizacao_tempo' => $usuario->penalizacao_tempo,

        ];

        return view('admin.penalizacoes-usuario', compact('usuario', 'penalizacoes'));


    }

}