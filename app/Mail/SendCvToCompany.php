<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCvToCompany extends Mailable
{
    use Queueable, SerializesModels;

    public $file;
    public $user;
    public $job_title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file, $user, $job_title)
    {
        $this->file = $file;
        $this->user = $user;
        $this->job_title = $job_title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail/SendCV')->attach('user-cv/' . $this->file);
    }
}
