<?php

namespace App\Jobs;

use App\Mail\assignHomeworkMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Utils;
use Illuminate\Support\Facades\Mail;

class SendHomeworkAssignMail implements ShouldQueue
{
    use Utils;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data, $user, $message;
    /**
     * Create a new job instance.
     */
    public function __construct($data, $message, $user)
    {
        $this->data = $data;
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->sendSMS($this->user->mobile, $this->message);
        Mail::to($this->user->email)->queue(new assignHomeworkMail($this->data));
    }
}
