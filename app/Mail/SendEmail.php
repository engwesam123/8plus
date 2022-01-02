<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $contact_us;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_us)
    {
        $this->contact_us = $contact_us;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('email@address.com')->locale(Config('app.locale'))
            ->markdown('Manager.dashboard.emails.index');
    }
}
