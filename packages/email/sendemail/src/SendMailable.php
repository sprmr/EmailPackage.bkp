<?php


namespace Email\SendEmail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{   

    use Queueable, SerializesModels;
    public $subject;
    public $msg;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject,$msg)
    {
       
        $this->subject = $subject;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(__($this->subject))->markdown('sendemail::send_mail')->with('msg',$this->msg);  
    }
}