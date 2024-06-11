<?php

namespace App\Jobs;

use App\Mail\submitHomeworkMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendHomeworkSubmitMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $data, $email;
    /**
     * Create a new job instance.
     */
    public function __construct($data, $email)
    {
        $this->data = $data;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new submitHomeworkMail($this->data));
    }
}
