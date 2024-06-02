<?php

namespace App\Jobs;

use App\Mail\AdmissionMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Utils;
use Illuminate\Support\Facades\Mail;

class SendAdmissionMail implements ShouldQueue
{
    use Utils;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data, $number, $message;
    /**
     * Create a new job instance.
    */
    public function __construct($data, $message, $number)
    {
        $this->data = $data;
        $this->number = $number;
        $this->message = $message;
    }

    /**
     * Execute the job.
    */
    public function handle(): void
    {
        // $this->sendSMS($this->number, $this->message);
        Mail::to($this->data['email'])->send(new AdmissionMail($this->data));
    }
}
