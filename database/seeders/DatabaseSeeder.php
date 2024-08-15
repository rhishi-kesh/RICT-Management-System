<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SystemInformation::class);
        $this->call(SmtpSettingsSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(MentorSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(PaymentType::class);
        $this->call(CouncilingPerson::class);
    }
}
