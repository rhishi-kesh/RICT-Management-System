<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mentor')->insert([
           [
            'name' => 'syful',
            'email' => 'syful@gmail.com',
            'mobile' => '01716726510',
            'created_at' => now(),
            'updated_at' => now()
           ],
           [
            'name' => 'rhishi',
            'email' => 'rhishi@gmail.com',
            'mobile' => '01716726510',
            'created_at' => now(),
            'updated_at' => now()
           ],
           [
            'name' => 'habib',
            'email' => 'habib@gmail.com',
            'mobile' => '01716726510',
            'created_at' => now(),
            'updated_at' => now()
           ],

        ]);
    }
}
