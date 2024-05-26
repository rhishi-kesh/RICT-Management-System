<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class MailConfigServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // Ensure the smtps table exists
        if (Schema::hasTable('smtps')) {
            // Fetch the first entry from the smtps table
            $mail = DB::table('smtps')->first();

            if ($mail) { // Check if the table is not empty
                $config = [
                    'driver'     => $mail->driver,
                    'host'       => $mail->host,
                    'port'       => $mail->port,
                    'from'       => ['address' => $mail->from_address, 'name' => $mail->from_name],
                    'encryption' => $mail->encryption,
                    'username'   => $mail->username,
                    'password'   => $mail->password,
                ];

                // Set the mail configuration dynamically
                Config::set('mail', $config);
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Bootstrapping code can be placed here if needed
    }
}
