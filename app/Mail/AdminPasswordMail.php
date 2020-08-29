<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\ForgetPassword;

class AdminPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $data;
    public function __construct(ForgetPassword $pass)
    {
        $this->data=$pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@itclanbd.com')->subject('Admin Password Change')
                                                ->view('Mail.adminforgetpasslink')
                                                ->with('data',$this->data);
    }
}
