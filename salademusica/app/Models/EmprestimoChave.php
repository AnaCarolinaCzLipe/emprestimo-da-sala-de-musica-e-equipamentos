<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmprestimoChave extends Model
{
    use HasFactory;

    protected $table = "solicitacoes_emprestimos_chaves";

    protected $fillable = [

        "texto",
        "status",
        "diaEmprestimo",
        "horarioEntrada",
        "horarioEntrega",
        "comentario"
        
        
    ];
    
    public function user()
    {

        return $this->belongsTo(User::class);
        
    }

}
