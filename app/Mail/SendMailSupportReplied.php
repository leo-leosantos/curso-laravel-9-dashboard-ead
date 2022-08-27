<?php

namespace App\Mail;

use App\Models\ReplaySupport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailSupportReplied extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public ReplaySupport $replySupport;

    public function __construct($replySupport)
    {
            $this->replySupport = $replySupport;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Duvida respondida')
        ->markdown('mails.supports.support-replied');
    }
}
