<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $table = "solicitacoes";

    protected $fillable = [

        "motivoSolicitacao",
        "diaEmprestimo",
        "status",
        "horarioEntrada",
        "horarioEntrega",
        'comentario',
        "equipamento_id",
        "usuario_id"

    ];

    public function equipamentos()
    {

        return $this->belongsToMany(Equipamento::class, 'equipamento_solicitacao');

    }

    public function user()
    {

        return $this->belongsTo(User::class, 'usuario_id');
        
    }
    
}
