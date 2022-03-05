<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeCustomer extends Mailable
{
    use Queueable, SerializesModels;

    public $customerNameSurname;
    public $couponCode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerNameSurname, $couponCode)
    {
        $this->customerNameSurname = $customerNameSurname;
        $this->couponCode = $couponCode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config("app.name"). ' - ' . __("mail-title.WELCOME_CUSTOMER"))
                                ->view('emails.auth.welcome-customer');

    }
}
