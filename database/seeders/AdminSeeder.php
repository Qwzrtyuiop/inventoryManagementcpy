<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => 'adminpass', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
