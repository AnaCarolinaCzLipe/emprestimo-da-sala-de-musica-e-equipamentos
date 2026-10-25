<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\SolicitacaoChaveAlteradaConfirmada;
use App\Mail\SolicitacaoChaveAlteradaRejeitada;
use App\Models\EmprestimoChave;
use App\Models\HistoricoSolicitacao;
use App\Models\User;
use Illuminate\Http\Request;

class EmprestimoChaveController extends Controller
{
    
    /**
    * Display a listing of the resource.
    */

    public function index(Request $request)
    {

        $solicitacoesChaves = EmprestimoChave::whereIn('status', ['Em Posse', 'Pendente', 'Confirmada', "Alterada"])->orderBy('id')->paginate(10);
        return view("emprestimochave.index", compact("solicitacoesChaves"));

    }
        
    public function solicitacoesRecusadas(Request $request)
    {

        $solicitacoesChaves = EmprestimoChave::whereIn('status', ['Rejeitada', 'Alterada Rejeitada'])->orderBy('id')->paginate(10);
        return view("emprestimochave.solicitacoes-recusadas", compact("solicitacoesChaves"));
            
    }

    public function confirmarSolicitacaoAlterada($id){

        $solicitacaoChave = EmprestimoChave::find($id);

        $solicitacaoChave->status = 'Confirmada';

        $solicitacaoChave->save();

        HistoricoSolicitacao::create([

            'user_id' => $solicitacaoChave->user_id,
            'tipo' => 'EmprestimoChave',
            'status' => 'Confirmada',

        ]);

        $user = $solicitacaoChave->user;

        $emailsAdmin = User::whereIn('role', ['Admin', 'Controlador'])->get();

        if ($emailsAdmin->isNotEmpty()) {

            $emailData = [

                'user' => $user,
                'solicitacaoChave' => $solicitacaoChave,

            ];
    
            foreach ($emailsAdmin as $admin) {

                Mail::to($admin->email)->send(new SolicitacaoChaveAlteradaConfirmada($emailData));

            }

        }

        return redirect()->back();

    }

    public function rejeitarSolicitacaoAlterada($id)
    {
        $solicitacaoChave = EmprestimoChave::find($id);
    
        if (!$solicitacaoChave) {
            return redirect()->back()->with('error', 'Solicitação não encontrada.');
        }
    
        $solicitacaoChave->status = 'Alterada Rejeitada';

        $solicitacaoChave->save();

        HistoricoSolicitacao::create([

            'user_id' => $solicitacaoChave->user_id,
            'tipo' => 'EmprestimoChave',
            'status' => 'Alterada Rejeitada',

        ]);

        $user = $solicitacaoChave->user;

        $emailsAdmin = User::whereIn('role', ['Admin', 'Controlador'])->get();

        if ($emailsAdmin->isNotEmpty()) {

            $emailData = [

                'user' => $user,
                'solicitacaoChave' => $solicitacaoChave,

            ];
    
            foreach ($emailsAdmin as $admin) {

                Mail::to($admin->email)->send(new SolicitacaoChaveAlteradaRejeitada($emailData));

            }

        }
        
        return redirect()->back();

    }

    /**
    * Show the form for creating a new resource.
    */

    public function create()
    {

        return view("emprestimochave.create-form");

    }

    /**
    * Store a newly created resource in storage.
    */

    public function store(Request $request)
    {

        $request->validate([

            'texto-solicitacao' => 'required|string|max:100',
            'dia-emprestimo' => 'required|date',
            'horario-entrada' => ['required', 'regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/'],
            'horario-entrega' => ['required', 'regex:/^([01][0-9]|2[0-3]):([0-5][0-9])$/'],

        ]);
            
        if($request->user())
        {

            $solicitacaoChave = $request->user()->solicitacoeschaves()->create
            ([

                'texto' => $request->input('texto-solicitacao', ''),
                'diaEmprestimo' => $request->input('dia-emprestimo', ''),
                'horarioEntrada' => $request->input('horario-entrada', ''),
                'horarioEntrega' => $request->input('horario-entrega', ''),

            ]);

            HistoricoSolicitacao::create([

                'user_id' => $request->user()->id,
                'tipo' => 'EmprestimoChave',
                'status' => 'Solicitação Criada',
    
            ]);

            return redirect()->route('emprestimochave.index', compact("solicitacaoChave"));

        }

        return redirect()->route('login');
                
    }

    /**
    * Display the specified resource.
    */

    public function show($id)
    {

        $solicitacaoChave = EmprestimoChave::findOrFail($id);
        return view("emprestimochave.show",compact("solicitacaoChave"));

    }
    
    /**
    * Show the form for editing the specified resource.
    */

    public function edit($id)
    {
    
        $solicitacaoChave = EmprestimoChave::findOrFail($id);
        return view("emprestimochave.edit-form",compact("solicitacaoChave"));

    }

    /**
    * Update the specified resource in storage.
    */

    public function update(Request $request, $id)
    {

        if($request->user()) {

            $solicitacaoChave = $request->user()->solicitacoeschaves()->findOrFail($id);
        
            $solicitacaoChave->update([

                'texto' => $request->input('texto-solicitacao', ''),
                'diaEmprestimo' => $request->input('dia-emprestimo', ''),
                'horarioEntrada' => $request->input('horario-entrada', ''),
                'horarioEntrega' => $request->input('horario-entrega', ''),

            ]);

            return redirect()->route('emprestimochave.index');

        }
        
        return redirect()->route('login');
 

    }

    /**
    * Remove the specified resource from storage.
    */

    public function destroy($id)
    {

        $solicitacaoChave = EmprestimoChave::find($id);
        
        $solicitacaoChave->delete();
            
        return redirect()->back();
            
    }

    public function deletarVariasSolicitacoesChave(Request $request)
    {

        $ids = $request->input('id');

        if (is_array($ids) && count($ids) > 0) {

            EmprestimoChave::whereIn('id', $ids)->delete();
            
        }
        
        return redirect()->back();

    }

}
