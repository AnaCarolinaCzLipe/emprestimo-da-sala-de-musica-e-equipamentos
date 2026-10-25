<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruposMusicais extends Model
{
    use HasFactory;

    protected $table = "grupos_musicais";

    protected $fillable = [
        "nomeGrupo",
        "fotoGrupo",
        "informacaoGrupo",
        "integrantes",
        "horariosEnsaio",
    ];

    protected $casts = [

        "fotoGrupo" => 'array',
        'integrantes' => 'array',

    ];
    
}