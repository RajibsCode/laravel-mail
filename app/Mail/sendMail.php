<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    // 7. assign the variables as public and in _construct()
    public $name;
    public $subject;
    public $email;
    public $message;

    public function __construct($name, $subject, $email, $message)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->email = $email;
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('Send Demo Mail')->view('mail-template');
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            // // set mail subject
            // subject: 'Send Demo Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'mail-template',
            with: [
                'name' => $this->name,
                'subject' => $this->subject,
                'email' => $this->email,
                'message' => $this->message
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
