<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RespondCommerceToClient extends Mailable
{
    use Queueable, SerializesModels;

    public $messageCommerce;

    public function __construct($messageCommerce)
    {
        $this->messageCommerce = $messageCommerce;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.MailRespondCommerceToClient')
            ->from('no-responder@guiaceliaca.com.ar','Guía Celíaca')
            ->subject('Respuesta local Guía Celíaca');
    }
}
