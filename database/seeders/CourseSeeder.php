<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            'name' => 'Web Development',
            'slug' => 'web-development',
            'fee' => '5000',
            'description' => 'Description',
            'duration' => '3',
            'lecture' => '30',
            'project' => '5',
            'thumbnail' => 'empty.png',
            'department_id' => 1,
            'created_at' => Carbon::now(),
         ]);

         File::copy(
             public_path('empty.png'),
             Storage::path('public/department/empty.png')
         );
    }
}
