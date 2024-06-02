<?php

namespace App\Jobs;

use App\Mail\MentorMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Utils;
use Illuminate\Support\Facades\Mail;

class SendMentorMail implements ShouldQueue
{
    use Utils;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data, $mobile, $message;
    /**
     * Create a new job instance.
     */
    public function __construct($data, $message, $mobile)
    {
        $this->data = $data;
        $this->mobile = $mobile;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->sendSMS($this->mobile, $this->message);
        Mail::to($this->data['email'])->send(new MentorMail($this->data));

    }
}
