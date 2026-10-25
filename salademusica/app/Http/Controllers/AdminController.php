<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\EmprestimoChave;
use App\Models\Solicitacao;
use App\Models\Equipamento;
use App\Models\User;
use App\Models\HistoricoSolicitacao;
use App\Mail\SolicitacaoChaveAprovada;
use App\Mail\SolicitacaoChaveRejeitada;
use App\Mail\SolicitacaoChaveAlterada;
use App\Mail\SolicitacaoEquipamentoAprovada;
use App\Mail\SolicitacaoEquipamentoAlterada;
use App\Mail\SolicitacaoEquipamentoRejeitada;
use App\Http\Controllers\RelatorioController;
use Carbon\Carbon;

class AdminController extends Controller
{

    // --------------------------------------- Manual Administrador ---------------------------------------
    
    public function indexAjudaAdmin()
    {
        
        return view('ajuda.adminajuda');

    }
    
    public function historicoPenalizacoes($id)
    {

        $usuario = User::findOrFail($id);

        $penalizacoes = HistoricoSolicitacao::where('user_id', $id)->where('penalizado_historico', 1)->select('created_at', 'penalizacao_tempo_historico', 'motivo_penalizacao')
        ->paginate(10);

        $penalizacoes->getCollection()->transform(function ($penalizacao) 
        {

            $penalizacao->penalizacao_tempo_historico = $penalizacao->penalizacao_tempo_historico ? Carbon::parse($penalizacao->penalizacao_tempo_historico) : null;

            return $penalizacao;

        });

        return view('admin.historico-penalizacao', compact('usuario', 'penalizacoes'));

    }

    // --------------------------------------- Solicitações Equipamentos --------------------------------------- //

    public function deletarSolicitacaoEmprestimoEquipamento($id)
    {
        
        $solicitacao = Solicitacao::find($id);
        
        $solicitacao->delete();
        
        return redirect()->back();
        
    }
    
    public function aceitarSolicitacaoEquipamento(Request $request, $id){
        
        $solicitacao = Solicitacao::find($id);
        
        $solicitacao->status = 'Em Posse';

        $solicitacao->save();
        
        HistoricoSolicitacao::create([

            'user_id' => $solicitacao->usuario_id,
            'tipo' => 'EmprestimoEquipamento',
            'status' => 'Em Posse',

        ]);

        $user = $solicitacao->user;

        $email = $user->email;
        
        $equipamentosSelecionados = $solicitacao->equipamentos->pluck('nome')->toArray();

        if ($email) {
            
            $emailData = [

                'user' => $user,
                'solicitacao' => $solicitacao,
                'equipamentosSelecionados' => $equipamentosSelecionados,

            ];
            
            Mail::to($email)->send(new SolicitacaoEquipamentoAprovada($emailData));
        }
        
        return redirect()->back();
        
    }

    public function editEquipamento($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $equipamentos = Equipamento::all();
        $users = User::all();
        return view("solicitacoes.edit-form-admin", compact("solicitacao"))->with('users', $users)->with('equipamentos', $equipamentos);


    }

    /**
    * Update the specified resource in storage.
    */

    public function updateEquipamento(Request $request, $id)
    {

        $request->validate([

            'comentario' => 'required|string|max:200',
            'equipamentos' => 'required|array|min:1',
            'equipamentos.*' => 'integer|exists:equipamentos,id',
        
        ]);

        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->save();

        $solicitacao->status = 'Alterada';

        HistoricoSolicitacao::create([

            'user_id' => $solicitacao->usuario_id,
            'tipo' => 'EmprestimoEquipamento',
            'status' => 'Alterada',

        ]);

        $solicitacao->comentario = $request->comentario;

        $solicitacao->save();

        $user = $solicitacao->user;
        
        $email = $user->email;

        $equipamentosSelecionados = Equipamento::whereIn('id', $request->equipamentos)->pluck('nome');

        if ($email) {

            $emailData = [
                
                'user' => $user,
                'solicitacao' => $solicitacao,
                'equipamentosSelecionados' => $equipamentosSelecionados,

            ];
    
            Mail::to($email)->send(new SolicitacaoEquipamentoAlterada($emailData));

        }

        $solicitacao->equipamentos()->sync($request->equipamentos);

        return redirect()->route('solicitacoes.index')->withSuccess(__('Solicitacao atualizada com sucesso.'));

    }
    
    public function rejeitarSolicitacaoEquipamento(Request $request, $id)
    {

        $request->validate([

            'comentario' => 'required|string|max:600',

        ]);
    
        $solicitacao = Solicitacao::find($id);
    
        if (!$solicitacao) {

            return redirect()->back()->with('error', 'Solicitação não encontrada.');
            
        }
    
        $solicitacao->status = 'Rejeitada';

        $solicitacao->comentario = $request->comentario;

        $solicitacao->save();
    
        HistoricoSolicitacao::create([

            'user_id' => $solicitacao->usuario_id,
            'tipo' => 'EmprestimoEquipamento',
            'status' => 'Rejeitada',

        ]);

        $user = $solicitacao->user;

        $equipamentosSelecionados = $solicitacao->equipamentos->pluck('nome')->toArray();

        $email = $user->email;
    
        if ($email) {

            $emailData = [

                'user' => $user,
                'solicitacao' => $solicitacao,
                'equipamentosSelecionados' => $equipamentosSelecionados,

            ];
    
            Mail::to($email)->send(new SolicitacaoEquipamentoRejeitada($emailData));

        }
    
        return redirect()->back()->with('success', 'Solicitação rejeitada com sucesso.');

    }


    // --------------------------------------- Solicitações Chave --------------------------------------- //

    public function deletarSolicitacaoEmprestimoChave($id)
    {

        $solicitacaoChave = EmprestimoChave::find($id);

        $solicitacaoChave->delete();

        return redirect()->back();

    }

    public function confirmarSolicitacaoChave($id){

        $solicitacaoChave = EmprestimoChave::find($id);

        $solicitacaoChave->status = 'Confirmada';

        $solicitacaoChave->save();

        $user = $solicitacaoChave->user;
        $email = $user->email;

        HistoricoSolicitacao::create([

            'user_id' => $solicitacaoChave->user_id,
            'tipo' => 'EmprestimoChave',
            'status' => 'Confirmada',

        ]);

        if ($email) {

            $emailData = [
                'user' => $user,
                'solicitacaoChave' => $solicitacaoChave,
            ];

            Mail::to($email)->send(new SolicitacaoChaveAprovada($emailData));

        }

        return redirect()->back();

    }

    public function emPosseSolicitacaoChave($id){

        $solicitacaoChave = EmprestimoChave::find($id);

        $outraSolicitacaoEmPosse = EmprestimoChave::where('status', 'Em Posse')->first();

        if ($outraSolicitacaoEmPosse) {

            $errorMessage = 'Apenas uma solicitação pode ser marcada como "Em Posse".';

            return back()->withErrors([$errorMessage]);

        }

        $solicitacaoChave->status = 'Em Posse';

        $solicitacaoChave->save();

        HistoricoSolicitacao::create([

            'user_id' => $solicitacaoChave->user_id,
            'tipo' => 'EmprestimoChave',
            'status' => 'Em Posse',

        ]);

        return redirect()->back();

    }

    public function rejeitarSolicitacaoChave(Request $request, $id)
    {

        $request->validate([

            'comentario' => 'required|string|max:600',

        ]);
    
        $solicitacaoChave = EmprestimoChave::find($id);
    
        if (!$solicitacaoChave) {

            return redirect()->back()->with('error', 'Solicitação não encontrada.');
            
        }
    
        $solicitacaoChave->status = 'Rejeitada';
        $solicitacaoChave->comentario = $request->comentario;
        $solicitacaoChave->save();
    

        HistoricoSolicitacao::create([

            'user_id' => $solicitacaoChave->user_id,
            'tipo' => 'EmprestimoChave',
            'status' => 'Rejeitada',

        ]);

        $user = $solicitacaoChave->user;
        $email = $user->email;
    
        if ($email) {

            $emailData = [
                'user' => $user,
                'solicitacaoChave' => $solicitacaoChave,
            ];
    
            Mail::to($email)->send(new SolicitacaoChaveRejeitada($emailData));

        }
    
        return redirect()->back()->with('success', 'Solicitação rejeitada com sucesso.');

    }

    public function edit($id)
    {
    
        $solicitacaoChave = EmprestimoChave::findOrFail($id);
        return view("emprestimochave.edit-form-admin",compact("solicitacaoChave"));

    }

    public function update(Request $request, $id)
    {

        if($request->user()) {

            $solicitacaoChave = EmprestimoChave::findOrFail($id);
        
            $solicitacaoChave->update([

                'comentario' => $request->input('comentario', ''),
                'diaEmprestimo' => $request->input('dia-emprestimo', ''),
                'horarioEntrada' => $request->input('horario-entrada', ''),
                'horarioEntrega' => $request->input('horario-entrega', ''),

            ]);

            $solicitacaoChave->status = 'Alterada';

            $solicitacaoChave->comentario = $request->comentario;

            $solicitacaoChave->save();

            HistoricoSolicitacao::create([

                'user_id' => $solicitacaoChave->user_id,
                'tipo' => 'EmprestimoChave',
                'status' => 'Alterada',
    
            ]);

            $user = $solicitacaoChave->user;
            
            $email = $user->email;
        
            if ($email) {
    
                $emailData = [
                    
                    'user' => $user,
                    'solicitacaoChave' => $solicitacaoChave,

                ];
        
                Mail::to($email)->send(new SolicitacaoChaveAlterada($emailData));
    
            }
            
            return redirect()->route('emprestimochave.index');

        }
        
        return redirect()->route('login');
 
    }

    // --------------------------------------- Permissões ---------------------------------------

    protected $relatorioController;

    public function __construct(RelatorioController $relatorioController)
    {

        $this->relatorioController = $relatorioController;

    }

    public function mostrarUsuarios(Request $request){

        $alunos = User::where('role', 'Aluno')->orderBy('nome', 'asc')->paginate(10, ['*'], 'paginas_aluno');

        $servidores = User::where('role', 'Servidor')->orderBy('nome', 'asc')->paginate(10, ['*'], 'paginas_servidor');

        $administradores = User::where('role', 'Admin')->orderBy('nome', 'asc')->paginate(10, ['*'], 'paginas_admin');

        $usuarios = User::where('role', 'Usuário')->orderBy('nome', 'asc')->paginate(10, ['*'], 'paginas_usuario');

        return view("admin.lista-usuarios", compact('alunos', 'servidores', 'administradores', 'usuarios'));

    }

    public function relatorioUsuario($id)
    {

        $relatorio = $this->relatorioController->relatorioUsuario($id);

        return response()->json($relatorio);    

    }

    public function relatorioGeral()
    {

        $relatorio = $this->relatorioController->relatorioGeral();

        return response()->json($relatorio);

    }

    public function atualizarCargo(Request $request)
    {

        $user = $request->user();

        $cargoUsuario = User::findOrFail($request->user);

        $request->validate([

            'role' => 'required|in:Admin,Servidor,Usuário,Aluno',
            
        ]);

        if ($user->role == 'Controlador') 
        {

            $cargoUsuario->role = $request->role;
            $cargoUsuario->save();

            return redirect()->route('admin.lista-usuarios', ['#' . strtolower($request->role)])->with('success', 'Papel do usuário atualizado com sucesso.');
        
        }

        else 
        {

            return redirect()->route('admin.lista-usuarios')->with('error', 'Você não tem permissão para modificar o papel do usuário.');
        
        }

    }

}
