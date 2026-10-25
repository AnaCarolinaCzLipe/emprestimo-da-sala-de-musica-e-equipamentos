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
        Schema::create('solicitacoes', function (Blueprint $table) {
            $table->id();
            $table->string("motivoSolicitacao", 100);
            $table->date("diaEmprestimo");
            $table->string("status", 20)->default("Pendente");
            $table->time("horarioEntrada");
            $table->time("horarioEntrega");
            $table->string("comentario", 600)->nullable();
            $table->bigInteger("usuario_id")->unsigned();
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitacoes');
    }
};
