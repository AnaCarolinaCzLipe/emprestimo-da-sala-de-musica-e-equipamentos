<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Solicitacao;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Models\Equipamento;
use App\Models\HistoricoSolicitacao;
use App\Mail\SolicitacaoEquipamentoAlteradaConfirmada;
use App\Mail\SolicitacaoEquipamentoAlteradaRejeitada;
use Illuminate\View\View;

class SolicitacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function solicitacoesEquipamentosRecusadas(Request $request)
    {
         
        $solicitacoesEquipamentos = Solicitacao::whereIn('status', ['Rejeitada', 'Alterada Rejeitada'])->orderBy('id')->paginate(10);
        return view("solicitacoes.solicitacoes-equipamentos-recusadas", compact("solicitacoesEquipamentos"));
         
    }

    public function confirmarSolicitacaoAlterada(Request $request, $id){

        $solicitacao = Solicitacao::findOrFail($id);
    
        $solicitacao->status = 'Em Posse';

        $solicitacao->save();

        HistoricoSolicitacao::create([

            'user_id' => $solicitacao->usuario_id,
            'tipo' => 'EmprestimoEquipamento',
            'status' => 'Confirmada',

        ]);
        
        $emailsAdmin = User::whereIn('role', ['Admin', 'Controlador'])->get();

        $equipamentosSelecionados = $solicitacao->equipamentos->pluck('nome')->toArray();
        
        $emailData = [

            'user' => $solicitacao->user,
            'solicitacao' => $solicitacao,
            'equipamentosSelecionados' => $equipamentosSelecionados,

        ];
        
        foreach ($emailsAdmin as $admin) {

            Mail::to($admin->email)->send(new SolicitacaoEquipamentoAlteradaConfirmada($emailData));

        }
        
        return redirect()->back();

    }

    public function rejeitarSolicitacaoAlterada(Request $request, $id)
    {

        $solicitacao = Solicitacao::findOrFail($id);
    
        $solicitacao->status = 'Rejeitada';

        $solicitacao->save();
        
        HistoricoSolicitacao::create([

            'user_id' => $solicitacao->usuario_id,
            'tipo' => 'EmprestimoEquipamento',
            'status' => 'Alterada Rejeitada',

        ]);

        $emailsAdmin = User::whereIn('role', ['Admin', 'Controlador'])->get();
        
        $equipamentosSelecionados = $solicitacao->equipamentos->pluck('nome')->toArray();
        
        $emailData = [

            'user' => $solicitacao->user,
            'solicitacao' => $solicitacao,
            'equipamentosSelecionados' => $equipamentosSelecionados,

        ];
        
        foreach ($emailsAdmin as $admin) {

            Mail::to($admin->email)->send(new SolicitacaoEquipamentoAlteradaRejeitada($emailData));

        }
        
        return redirect()->back();

    }

    public function index()
    {

        $equipamento = Auth::user();
        $user = Auth::user();
        $solicitacoes = Solicitacao::whereIn('status', ['Em Posse', 'Pendente', "Alterada"])->orderBy("id")->paginate(10);

        return view("solicitacoes.index")->with('user', $user)->with('equipamento', $equipamento)->with('solicitacoes', $solicitacoes);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $equipamentos = Equipamento::all();
        $users = User::all();

        return view("solicitacoes.create")->with('users', $users)->with('equipamentos', $equipamentos);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $usuario_id = auth()->user()->id;

        $equipamentosSelecionados = $request->input('equipamentos');
    
        $request->validate([

            'motivoSolicitacao' => 'required|string|max:150',
            'equipamentos' => 'required|array|min:1',
            'equipamentos.*' => 'integer|exists:equipamentos,id',
            'diaEmprestimo' => 'required|date',
            'horarioEntrada' => ['required', 'regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/'],
            'horarioEntrega' => ['required', 'regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/'],

        ]);
    
        $solicitacao = new Solicitacao();
        $solicitacao->fill($request->all());
        $solicitacao->usuario_id = $usuario_id;
        $solicitacao->save();
    
        $solicitacao->equipamentos()->attach($equipamentosSelecionados);
    
        HistoricoSolicitacao::create([

            'user_id' => $request->user()->id,
            'tipo' => 'EmprestimoEquipamento',
            'status' => 'Solicitação Criada',

        ]);
        
        return redirect()->route('solicitacoes.index')->withSuccess(__('Solicitacao salva com sucesso.'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $solicitacao = Solicitacao::with('equipamentos')->findOrFail($id);
        return view("solicitacoes.show", compact("solicitacao"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $solicitacao = Solicitacao::findOrFail($id);
        $equipamentos = Equipamento::all();
        $users = User::all();
        return view("solicitacoes.edit", compact("solicitacao"))->with('users', $users)->with('equipamentos', $equipamentos);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $usuario_id = auth()->user()->id;

        $request->validate([

            'equipamentos' => 'required|array|min:1',
            'equipamentos.*' => 'integer|exists:equipamentos,id',
         
        ]);

        $solicitacao = Solicitacao::findOrFail($id);
        $solicitacao->fill($request->all());
        $solicitacao->usuario_id = $usuario_id;
        $solicitacao->save();

        $solicitacao->equipamentos()->sync($request->equipamentos);

        return redirect()->route('solicitacoes.index')->withSuccess(__('Solicitacao atualizada com sucesso.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $request = Solicitacao::findOrFail($id);
        
        if ($request->usuario_id === auth()->id() || auth()->user()->role === 'admin') {

            $request->delete();
            
            return redirect()->route('solicitacoes.index')->with('success', 'Solicitação excluída com sucesso.');

        } else {

            abort(403, 'Você não tem permissão para excluir esta solicitação.');

        }

    }

    public function deletarVariasSolicitacoesEquipamentos(Request $request)
    {
        
        $solicitacaoIds = $request->input('id');
        
        if (!empty($solicitacaoIds)) {
            
            Solicitacao::whereIn('id', $solicitacaoIds)->delete();
            
        }
        
        return redirect()->back();
        
    }
    
}