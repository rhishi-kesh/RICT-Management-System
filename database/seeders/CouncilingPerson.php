<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CouncilingPerson extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('councilings')->insert([
            'name' => 'Rhishi',
            'created_at' => Carbon::now(),
        ]);
    }
}
