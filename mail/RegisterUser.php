<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class RegisterUser
 * @package App\Mail
 */
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
    /**
     * @var string
     */
    private $token;

    /**
     * RegisterUser constructor.
     * @param string $username
     * @param string $token
     * @param string $email
     */
    public function __construct(string $username, string $token, string $email)
    {
        $this->username = $username;
        $this->token = $token;
        $this->email = $email;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(config('mail.from'))
            ->view('emails::register-user');
    }
}
