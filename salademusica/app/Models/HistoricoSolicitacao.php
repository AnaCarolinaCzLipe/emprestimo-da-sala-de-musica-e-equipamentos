<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoSolicitacao extends Model
{
    use HasFactory;

    protected $table = 'historico_solicitacoes';

    protected $fillable = [
        
        'user_id',
        'tipo',
        'status',
        'penalizado_historico',
        'penalizacao_tempo_historico',
        'motivo_penalizacao',

    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    
    }

}
