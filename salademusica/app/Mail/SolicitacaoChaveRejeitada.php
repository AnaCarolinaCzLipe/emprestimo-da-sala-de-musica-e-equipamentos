<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SolicitacaoChaveRejeitada extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $solicitacaoChave;

    public function __construct($emailData)
    {

        $this->user = $emailData['user'];
        $this->solicitacaoChave = $emailData['solicitacaoChave'];

    }

    public function envelope(): Envelope
    {

        return new Envelope(
            subject: 'Solicitação Rejeitada',
        );
        
    }

    public function build()
    {
        return $this->view('email.solicitacao-rejeitada-chave')
            ->with([
                'user' => $this->user,
                'solicitacaoChave' => $this->solicitacaoChave,
            ]);
    }

    public function content(): Content
    {
        return new Content(
            view: 'email.solicitacao-rejeitada-chave',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
