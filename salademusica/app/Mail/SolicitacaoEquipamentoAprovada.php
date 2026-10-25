<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitacaoEquipamentoAprovada extends Mailable
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

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitação Aprovada',
        );
    }

    public function build()
    {
        
        return $this
            ->view('email.confirmacao-equipamento-aprovada')
            ->with([     
            'solicitacao' => $this->solicitacao,
            'user' => $this->user,
            'equipamentosSelecionados' => $this->equipamentosSelecionados, 

        ]);

    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        return new Content(
            view: 'email.confirmacao-equipamento-aprovada',
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
