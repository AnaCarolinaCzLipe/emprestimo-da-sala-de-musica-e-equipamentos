<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitacaoEquipamentoRejeitada extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $solicitacao;
    protected $equipamentosSelecionados;

    public function __construct($emailData)
    {

        $this->user = $emailData['user'];
        $this->solicitacao = $emailData['solicitacao'];
        $this->equipamentosSelecionados = $emailData['equipamentosSelecionados'];

    }

    public function envelope(): Envelope
    {

        return new Envelope(
            subject: 'Solicitação Rejeitada',
        );
        
    }

    public function build()
    {
        return $this->view('email.solicitacao-rejeitada-equipamento')
            ->with([
                'user' => $this->user,
                'solicitacao' => $this->solicitacao,
                'equipamentosSelecionados' => $this->equipamentosSelecionados,

            ]);
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.solicitacao-rejeitada-equipamento',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
