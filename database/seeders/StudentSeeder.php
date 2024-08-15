<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = 'student111';
        DB::table('students')->insert([
            'student_id' => '11111111',
            'name' => 'Student',
            'gender' => 'male',
            'slug' => 'student',
            'fName' => 'student_father',
            'dateofbirth' => Carbon::now(),
            'mName' => 'student_mother',
            'email' => 'student123@gmail.com',
            'password' => Hash::make($password),
            'mobile' => '01625441232',
            'qualification' => 'Diploma',
            'profession' => 'Developer',
            'paymentType' => 1,
            'guardianMobileNo' => '01625441232',
            'address' => 'Noakhali',
            'course_id' => 1,
            'pay' => 1000,
            'due' => 4000,
            'total' => 5000,
            'created_at' => Carbon::now(),
        ]);
    }
}
