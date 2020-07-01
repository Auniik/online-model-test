<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;
    private $input;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input)
    {
        //
        $this->input = $input;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->input;
        return $this->from($data['email'], $data['name'])
            ->subject('Contact Us Mail')
            ->view('emails.contact')->with([
                'data' => $data
            ]);
    }
}
