<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitacaoChaveAlteradaConfirmada extends Mailable
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
            subject: 'Solicitação Alterada Confirmada',
        );
    }

    public function build()
    {
        
        return $this
            ->view('email.confirmacao-alterada-chave')
            ->with([     
            'solicitacaoChave' => $this->solicitacaoChave,
            'user' => $this->user, 
        ]);

    }

    public function content(): Content
    {
        return new Content(
            view: 'email.confirmacao-alterada-chave',
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
