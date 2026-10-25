<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitacaoEquipamentoAlteradaConfirmada extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $solicitacao;
    protected $equipamentosSelecionados;

    public function __construct($emailsAdmin)
    {
        
        $this->user = $emailsAdmin['user'];
        $this->solicitacao = $emailsAdmin['solicitacao'];
        $this->equipamentosSelecionados = $emailsAdmin['equipamentosSelecionados'];

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitacao Alterada Confirmada',
        );
    }

    public function build()
    {
        
        return $this
            ->view('email.confirmacao-alterada-equipamento')
            ->with([     
            'solicitacao' => $this->solicitacao,
            'user' => $this->user, 
            'equipamentosSelecionados' => $this->equipamentosSelecionados, 

        ]);

    }
    
    public function content(): Content
    {
        return new Content(
            view: 'email.confirmacao-alterada-equipamento',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
