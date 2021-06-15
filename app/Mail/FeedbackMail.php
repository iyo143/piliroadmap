<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user_name;
    public $email;
    public $department;
    public $feedback;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name,$email, $department, $feedback, $subject)
    {
        $this->email = $email;
        $this->user_name = $user_name;
        $this->department = $department;
        $this->subject  = $subject;
        $this->feedback = $feedback;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('feedback ');
    }
}
