<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @todo add bootstrap.css or spectre.css for mails ?
     */

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $username;

    public function __construct(string $username, string $token)
    {
        $this->username = $username;
        $this->email = $token;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from'))
            ->view('register-user');
    }
}
