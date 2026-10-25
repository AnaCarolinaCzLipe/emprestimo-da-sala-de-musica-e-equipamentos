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
        Schema::create('solicitacoes_emprestimos_chaves', function (Blueprint $table) {
            $table->id();
            $table->string("texto", 100);
            $table->date("diaEmprestimo");
            $table->time("horarioEntrada");
            $table->time("horarioEntrega");
            $table->string("status", 20)->default('Pendente');
            $table->string("comentario", 600)->nullable();
            $table->bigInteger("user_id")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes_emprestimos_chaves');
    }
};
