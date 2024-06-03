<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SmtpSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('smtps')->insert([
            [
                'driver' => 'smtp',
                'host' => 'smtp.gmail.com',
                'port' => 587,
                'username' => 'user1@mailtrap.io',
                'password' => 'hpvwkqawpockijse',
                'encryption' => 'tls',
                'from_address' => 'noreply@example1.com',
                'from_name' => 'Rayhans ICT',
                'created_at' => now(),
            ]
        ]);
    }
}
