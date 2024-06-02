<?php

namespace App\Jobs;

use App\Mail\TicketMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Utils;
use Illuminate\Support\Facades\Mail;

class SendTicketMail implements ShouldQueue
{
    use Utils;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data, $systemInformation, $message;
    /**
     * Create a new job instance.
     */
    public function __construct($data, $message, $systemInformation)
    {
        $this->data = $data;
        $this->systemInformation = $systemInformation;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->sendSMS($this->systemInformation->number, $this->message);
        Mail::to($this->systemInformation->email)->send(new TicketMail($this->data));
    }
}
