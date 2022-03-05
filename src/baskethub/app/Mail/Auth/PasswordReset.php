<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $urlToken;
    public $customerNameSurname;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($urlToken, $customerNameSurname)
    {
        $this->urlToken = $urlToken;
        $this->customerNameSurname = $customerNameSurname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config("app.name"). ' - ' . __("mail-title.PASSWORD_RESET"))
                                ->view('emails.auth.password-reset');
    }
}
