<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\BirthdayMail;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendBirthdayEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:birthday-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Birthday Emails';

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->format('m-d');

        $this->sendBirthdayEmails(User::class, $today, 'user');
        $this->sendBirthdayEmails(Student::class, $today, 'student');
        $this->sendBirthdayEmails(Mentor::class, $today, 'mentor');

        $this->info('All birthday emails have been queued.');
    }

    protected function sendBirthdayEmails($model, $today, $type)
    {
        try {

            $recipients = $model::whereRaw('DATE_FORMAT(dateofbirth, "%m-%d") = ?', [$today])->get();

            foreach ($recipients as $recipient) {
                Mail::to($recipient->email)->queue(new BirthdayMail($recipient, $type));
                $this->info("Queued birthday email to {$type}: " . $recipient->email);
            }

        } catch (\Exception $e) {
            \Log::error('Failed to send birthday emails: ' . $e->getMessage());
        }
    }
}
