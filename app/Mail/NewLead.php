<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLead extends Mailable
{
    use Queueable, SerializesModels;

    //dichiaro una variabile pubblica così da poterla passare alla pagina di visualizzazione del messsaggio
    public $messaggio;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_message)
    {
        $this->messaggio = $new_message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@sito.com')->view('mail.new-message');
    }
}
