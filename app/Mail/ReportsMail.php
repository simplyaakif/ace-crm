<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReportsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($queries,$admissions)
    {
        $this->queries = $queries;
        $this->admissions = $admissions;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@theonlineace.com','ACE American Institute')
            ->replyTo('americancenterofenglish@gmail.com')
            ->subject('Daily Report')->view('emails.reports.daily')
            ->with('queries',$this->queries)
            ->with('admissions',$this->admissions);
    }
}
