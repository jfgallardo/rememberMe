<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMails extends Mailable
{
    use Queueable, SerializesModels;
    protected $name;
    protected $title;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('jfgallardo95@gmail.com', 'NOTIFICATION')
                ->view('mail')
                ->with([
                    'name' => $this->name,
                    'title' => $this->title
                ]);
    }
}
