<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShiped extends Mailable
{
    use Queueable, SerializesModels;
public $name,$email,$sub,$msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$sub,$msg)
    {
        $this->msg=$msg;
        $this->name=$name;
        $this->email=$email;
        $this->sub=$sub;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $msg=$this->msg;
        $name=$this->name;
        $email=$this->email;
        $sub=$this->sub;
        //,compact('name','email','sub','msg')
        return $this->view('site.email.mail')->from('noreply@goth.com');
    }
}
