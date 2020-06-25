<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($assunto, $texto)
    {
        $this->assunto = $assunto;
        $this->texto = $texto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Notificação - {$this->assunto}")
            ->from('contato@maisadv.com.br','Sistema Mais Adv')
            ->view('publico.email.notificacao')->with([
                'assunto' => $this->assunto,
                'texto' => $this->texto
            ]);
    }
}
