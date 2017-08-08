<?php

namespace App\Mail\Rentals;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LockerRentalReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $submission;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($submission)
    {
        //
        $this->submission = $submission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.rental-submission.received');
    }
}
