<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;
    
    protected $table = "equipamentos";
    
    protected $fillable = [
        
        'nome',
        'tipoEquipamento',

    ];
    
    public function solicitacoes()
    {
        
        return $this->belongsToMany(Solicitacao::class, 'equipamento_solicitacao');

    }
    
}