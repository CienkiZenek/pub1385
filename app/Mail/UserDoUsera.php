<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserDoUsera extends Mailable
{
    use Queueable, SerializesModels;

    public $odbiorca;
    public $wysylajacy;
    public $tresc;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($tresc, $odbiorca, $wysylajacy)
    {
        $this->tresc=$tresc;
        $this->odbiorca=$odbiorca;
        $this->wysylajacy=$wysylajacy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.listDoUsera');
    }
}
