<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Models\HistoricoSolicitacao;
use App\Models\User;

class EquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //select * from tb_produto order by id desc limit 10
        $equipamentos = Equipamento::orderBy("id", "desc")->paginate(10);
        return view("equipamentos.index", compact("equipamentos"));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("equipamentos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([

            'nome' => 'required|max:255',

        ]);
        $equipamento = new Equipamento();
        $equipamento->nome = $storeData["nome"];
        $equipamento->tipoEquipamento = $request->input('tipoEquipamento', null);
        $equipamento->save();

        return redirect()->route('equipamentos.index')->withSuccess(__('Equipamento criado com sucesso.'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipamento = Equipamento::findOrFail($id);
        return view("equipamentos.show", compact("equipamento"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipamento = Equipamento::findOrFail($id);
        return view("equipamentos.edit", compact("equipamento"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeData = $request->validate([
            
            'nome' => 'required|max:255',

        ]);

        $equipamento = Equipamento::findOrFail($id);
        $equipamento->nome = $storeData["nome"];
        $equipamento->tipoEquipamento = $request->input('tipoEquipamento', null);
        $equipamento->update();

        return redirect()->route('equipamentos.index')->withSuccess(__('Equipamento atualizado com sucesso.'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipamento = Equipamento::findOrFail($id);
        $equipamento->delete();
        return redirect()->route('equipamentos.index')->withSuccess(__('Equipamento removida com sucesso.'));
        
    }

    public function deletarVariosEquipamentos(Request $request)
    {

        $ids = $request->input('id');

        if (is_array($ids) && count($ids) > 0) {

            Equipamento::whereIn('id', $ids)->delete();
            
        }
        
        return redirect()->back();

    }

}