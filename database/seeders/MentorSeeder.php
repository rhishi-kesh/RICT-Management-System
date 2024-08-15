<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = 'mentor111';
        DB::table('mentor')->insert([
            'name' => 'Mentor',
            'email' => 'mentor123@gmail.com',
            'password' => Hash::make($password),
            'mobile' => '01625441232',
            'created_at' => Carbon::now(),
        ]);
    }
}
