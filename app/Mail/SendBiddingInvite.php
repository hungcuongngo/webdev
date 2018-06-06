<?php

namespace App\Mail;

use App\Models\BiddingInvite;
use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendBiddingInvite extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(BiddingInvite $biddingInvite, Inquiry $inquiry)
    {
        $this->biddingInvite = $biddingInvite;
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.biddings.invite')
            ->with([
                'biddingInvite' => $this->biddingInvite,
                'inquiry' => $this->inquiry,
            ]);;
    }
}
