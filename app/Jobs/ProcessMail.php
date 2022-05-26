<?php

namespace App\Jobs;

use App\Mail\SendMails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $name;
    protected $title;
    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $title, $email)
    {
        $this->name = $name;
        $this->title = $title;
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new SendMails($this->name, $this->title);
        Mail::to($this->email)->send($email);
    }
}
