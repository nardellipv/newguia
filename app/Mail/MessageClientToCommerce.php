<?php

namespace App\Mail;

use App\Commerce;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageClientToCommerce extends Mailable
{
    use Queueable, SerializesModels;

    public $commerce;

    public function __construct(Commerce $commerce)
    {
        $this->commerce = $commerce;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.MessageClientToCommerce')
            ->subject('Mensaje en GuíaCelíaca')
            ->from('no-responder@guiaceliaca.com.ar');
    }
}
