<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmprestimoChaveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitacoesController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\GruposMusicaisController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerificadorTelefoneController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/inicio', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/reservas', function () {
    return view('layouts.reservas');
})->middleware(['auth', 'verified'])->name('layouts.reservas');

    Route::middleware('auth')->group(function () {
        
        Auth::routes([
        
            'verify'=> true
        
        ]);

        // Rotas Admin

        Route::get('/admin/configurações',[InicioController::class, 'index'])->name('admin.inicio-nav');
        Route::get('/admin/configurações/usuarios',[AdminController::class, 'mostrarUsuarios'])->name('admin.lista-usuarios');
        Route::post('/admin/configurações/usuarios/atualizar-cargo/{user}',[AdminController::class, 'atualizarCargo'])->name('admin.atualizarCargo');
        Route::get('/admin/relatorio-usuario/{id}', [AdminController::class, 'relatorioUsuario'])->name('admin.getRelatorioUsuario');
        Route::get('/admin/historico-de-penalizacoes/{id}', [AdminController::class, 'historicoPenalizacoes'])->name('admin.historico-penalizacao') ;
        Route::get('/admin/relatorio-geral', [AdminController::class, 'relatorioGeral'])->name('admin.relatorio-geral');

        // Usuário

        Route::post('/penalizar/{user}', [UserController::class, 'penalizacaoUsuario'])->name('penalizar.usuario');
        Route::post('/remover-penalizacao/{userId}', [UserController::class, 'removerPenalizacao'])->name('penalizar.remover-penalizacao');

        // Controle do Perfil

        Route::get('/perfil/configurações',[ProfileController::class, 'userStatus'])->name('profile.userStatus');
        Route::get('/perfil/informações',[ProfileController::class, 'index'])->name('profile.index');
        Route::patch('/perfil', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::patch('/perfil/{id}/salvar-foto', [ProfileController::class, 'gerenciarFotoPerfil'])->name('profile.gerenciarFotoPerfil');
        Route::delete('/perfil/{id}/deletar-foto', [ProfileController::class, 'deletarFotoPerfil'])->name('profile.deletarFotoPerfil');

        // Empréstimo de Chave

        Route::get('/empréstimo-chave-sala-de-música/solicitacoes-recusadas',[EmprestimoChaveController::class, 'solicitacoesRecusadas'])->name('emprestimochave.solicitacoes-recusadas');
        Route::get('/empréstimo-chave-sala-de-música/status',[EmprestimoChaveController::class, 'index'])->name('emprestimochave.index');
        Route::get('/empréstimo-chave-sala-de-música/solicitação/informações-solicitação/{id}',[EmprestimoChaveController::class, 'show'])->name('emprestimochave.show');
        Route::get('/empréstimo-chave-sala-de-música/criar-solicitação',[EmprestimoChaveController::class, 'create'])->name('emprestimochave.create-form');
        Route::get('/empréstimo-chave-sala-de-música/solicitação/{id}/editar-solicitação', [EmprestimoChaveController::class, 'edit'])->name('emprestimochave.edit-form');
        Route::post('/empréstimo-chave-sala-de-música/{id}/solicitação', [EmprestimoChaveController::class, 'store'])->name('emprestimochave.store');
        Route::patch('/empréstimo-chave-sala-de-música/solicitação/editar-solicitação/{id}', [EmprestimoChaveController::class, 'update'])->name('emprestimochave.update');
        Route::delete('/empréstimo-chave-sala-de-música/solicitação/{id}/excluir-solicitação', [EmprestimoChaveController::class, 'destroy'])->name('emprestimochave.destroy');
        Route::delete('/deletar/solicitacoes-chave', [EmprestimoChaveController::class, 'deletarVariasSolicitacoesChave'])->name('emprestimochave.deletar-multiplas-solicitacoes');

        Route::get('/empréstimo-chave-sala-de-música/rejeitar-solicitação-alterada/{id}',[EmprestimoChaveController::class, 'rejeitarSolicitacaoAlterada'])->name('emprestimochave.rejeitarSolicitacaoAlterada');
        Route::get('/empréstimo-chave-sala-de-música/confirmar-solicitação-alterada/{id}',[EmprestimoChaveController::class, 'confirmarSolicitacaoAlterada'])->name('emprestimochave.confirmarSolicitacaoAlterada');

        // Gerenciamento de Empréstimo de Chave Admin
        
        Route::post('/empréstimo-chave-sala-de-música/gerenciamento-solicitações/rejeitar-solicitação-chave/{id}', [AdminController::class, 'rejeitarSolicitacaoChave'])->name('admin.rejeitarSolicitacaoChave');;
        Route::get('/empréstimo-chave-sala-de-música/gerenciamento-solicitações/aceitar-solicitação-chave/{id}', [AdminController::class, 'confirmarSolicitacaoChave'])->name('admin.confirmarSolicitacaoChave');
        Route::get('/empréstimo-chave-sala-de-música/gerenciamento-solicitações/aprovar-solicitação-chave/{id}', [AdminController::class, 'emPosseSolicitacaoChave'])->name('admin.emPosseSolicitacaoChave');
        Route::get('/empréstimo-chave-sala-de-música/gerenciamento-solicitações/editar-solicitação-chave/{id}', [AdminController::class, 'edit'])->name('admin.edit-form-admin');
        Route::patch('/empréstimo-chave-sala-de-música/gerenciamento-solicitações/atualizar-solicitação/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('/empréstimo-chave-sala-de-música/gerenciamento-solicitações/{id}/admin/excluir-solicitação',[AdminController::class,  'deletarSolicitacaoEmprestimoChave'])->name('admin.deletarSolicitacaoEmprestimoChave');

        // Gerenciamento de Empréstimo dos equipamentos
        
        Route::get('/empréstimo-equipamento-sala-de-música/solicitação/editar-solicitação-equipamento/{id}', [AdminController::class, 'editEquipamento'])->name('admin.editEquipamento');;
        Route::patch('/empréstimo-equipamento-sala-de-música/solicitação/atualizar-solicitação-equipamento/{id}', [AdminController::class, 'updateEquipamento'])->name('admin.updateEquipamento');;
        Route::post('/empréstimo-equipamento-sala-de-música/solicitação/rejeitar-solicitação-equipamento/{id}', [AdminController::class, 'rejeitarSolicitacaoEquipamento'])->name('admin.solicitacaoEquipamentoRejeitada');;
        Route::get('/empréstimo-equipamento-sala-de-música/solicitação/aprovar-solicitação/{id}', [AdminController::class, 'aceitarSolicitacaoEquipamento'])->name('admin.solicitacaoEquipamentoAprovada');
        Route::delete('/empréstimo-equipamento-sala-de-música/solicitação/{id}/admin/excluir-solicitação',[AdminController::class,  'deletarSolicitacaoEmprestimoEquipamento'])->name('admin.deletarSolicitacaoEmprestimoEquipamento');
        
        // Soliticação de Equipamentos

        Route::get('/empréstimo-equipamento-sala-de-música/solicitacoes-recusadas',[SolicitacoesController::class, 'solicitacoesEquipamentosRecusadas'])->name('solicitacoes.solicitacoes-equipamentos-recusadas');
        Route::get('/empréstimo-equipamento-sala-de-música/status',[SolicitacoesController::class, 'index'])->name('solicitacoes.index');
        Route::get('/empréstimo-equipamento-sala-de-música/criar-solicitação', [SolicitacoesController::class, 'create'])->name('solicitacoes.create');
        Route::post('/empréstimo-equipamento-sala-de-música/criar-solicitação/salvar', [SolicitacoesController::class, 'store'])->name('solicitacoes.store');
        Route::get('/empréstimo-equipamento-sala-de-música/informacoes-solicitação/{id}', [SolicitacoesController::class, 'show'])->name('solicitacoes.show');
        Route::get('/empréstimo-equipamento-sala-de-música/editar-solicitação/{id}', [SolicitacoesController::class, 'edit'])->name('solicitacoes.edit');
        Route::patch('/empréstimo-equipamento-sala-de-música/editar-solicitação/atualizar/{id}',  [SolicitacoesController::class, 'update'])->name('solicitacoes.update');
        Route::delete('/empréstimo-equipamento-sala-de-música/deletar-solicitação/{id}', [SolicitacoesController::class, 'destroy'])->name('solicitacoes.destroy');
        Route::delete('/empréstimo-equipamento-sala-de-música/deletar-solicitação-equipamento', [SolicitacoesController::class, 'deletarVariasSolicitacoesEquipamentos'])->name('solicitacoesequipamentos.deletar-multiplas-solicitacoes');

        Route::get('/empréstimo-equipamento-sala-de-música-sala-de-música/rejeitar-solicitação-alterada/{id}',[SolicitacoesController::class, 'rejeitarSolicitacaoAlterada'])->name('solicitacoes.rejeitarSolicitacaoAlterada');
        Route::get('/empréstimo-equipamento-sala-de-música-sala-de-música/confirmar-solicitação-alterada/{id}',[SolicitacoesController::class, 'confirmarSolicitacaoAlterada'])->name('solicitacoes.confirmarSolicitacaoAlterada');
        
        // Equipamentos

        Route::get('/equipamentos-sala-de-música',[EquipamentosController::class, 'index'])->name('equipamentos.index');
        Route::get('/equipamentos/criar-equipamento', [EquipamentosController::class, 'create'])->name('equipamentos.create');
        Route::post('/equipamentos-sala-de-música/salvar', [EquipamentosController::class, 'store'])->name('equipamentos.store');
        Route::get('/equipamentos-sala-de-música/{equipamento}/informações-do-equipamento', [EquipamentosController::class, 'show'])->name('equipamentos.show');
        Route::get('/equipamentos-sala-de-música/{equipamento}/editar-equipamento', [EquipamentosController::class, 'edit'])->name('equipamentos.edit');
        Route::patch('/equipamentos-sala-de-música/{equipamento}/atualizar',  [EquipamentosController::class, 'update'])->name('equipamentos.update');
        Route::delete('/equipamentos-sala-de-música/{equipamento}/deletar', [EquipamentosController::class, 'destroy'])->name('equipamentos.destroy');
        Route::delete('/equipamentos-sala-de-música/deletar-vários-equipamentos', [EquipamentosController::class, 'deletarVariosEquipamentos'])->name('equipamentos.deletar-multiplos-equipamentos');

        // Grupos Musicais

        Route::get('/grupos',[GruposMusicaisController::class, 'index'])->name('gruposmusicais.inicio-grupos');
        Route::get('/grupos/informacoes/grupo-{id}',[GruposMusicaisController::class, 'show'])->name('gruposmusicais.informacoes-grupo');
        Route::get('/grupos/criar-grupos',[GruposMusicaisController::class, 'create'])->name('gruposmusicais.create-form');
        Route::get('/grupos/editar-grupos-{id}',[GruposMusicaisController::class, 'edit'])->name('gruposmusicais.editar-grupos-form');
        Route::post('/grupos/criar-grupos/salvar',[GruposMusicaisController::class, 'store'])->name('gruposmusicais.store');
        Route::put('/grupos/criar-grupos/atualizar-{id}',[GruposMusicaisController::class, 'update'])->name('gruposmusicais.update');
        Route::delete('/grupos/informacoes/{id}/deletar', [GruposMusicaisController::class, 'destroy'])->name('gruposmusicais.deletar-grupo');

        // Suporte de usuário
        
        Route::get('/suporte-de-ajuda', [InicioController::class, 'indexAjuda'])->name('ajuda.ajuda');
        
        // Suporte do administrador
        
        Route::get('/suporte-de-ajuda-admin', [AdminController::class, 'indexAjudaAdmin'])->name('ajuda.adminajuda');
        
    });

require __DIR__.'/auth.php';

Route::get('/admin/inicio', [InicioController::class, 'index'])
    ->middleware(['auth', 'admin'])
    ->name('admin.inicio');