<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('grupos_musicais', function (Blueprint $table) {
            $table->id();
            $table->string("nomeGrupo", 100);
            $table->json("fotoGrupo")->nullable();
            $table->string("informacaoGrupo", 700);
            $table->json("integrantes");
            $table->string("horariosEnsaio", 70)->nullable();
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos_musicais');
    }
    
};