<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = 'admin111';
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make($password),
            'role' => 1,
            'created_at' => Carbon::now(),
        ]);
    }
}
