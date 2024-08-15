<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            'name' => 'School IT Star',
            'slug' => 'school-it-star',
            'image' => 'empty.png',
            'created_at' => Carbon::now(),
        ]);

        File::copy(
            public_path('empty.png'),
            Storage::path('public/department/empty.png')
        );
    }
}
