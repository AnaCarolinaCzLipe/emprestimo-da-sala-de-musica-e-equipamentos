<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitacaoChaveAlteradaRejeitada extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $solicitacaoChave;

    public function __construct($emailData)
    {
        
        $this->user = $emailData['user'];
        $this->solicitacaoChave = $emailData['solicitacaoChave'];

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitação Alterada Rejeitada',
        );
    }

    public function build()
    {
        return $this->view('email.rejeicao-alteracao-chave')
            ->with([
                'user' => $this->user,
                'solicitacaoChave' => $this->solicitacaoChave,
            ]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.rejeicao-alteracao-chave',
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
