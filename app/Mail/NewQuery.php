<?php

namespace App\Mail;

use App\Queries;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewQuery extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Queries $query)
    {
        $this->query = $query;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('americaninstituteofenglish@gmail.com','ACE American Institute')
            ->subject('Visit at ACE')
            ->view('mails.query.new')
            ->with('query',$this->query);
    }
}
