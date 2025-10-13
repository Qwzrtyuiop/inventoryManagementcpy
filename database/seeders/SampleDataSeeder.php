<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SampleDataSeeder extends Seeder
{
    public function run(): void
    {
        $catId = DB::table('categories')->insertGetId([
            'name'       => 'Sample Category',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $itemId = DB::table('items')->insertGetId([
            'category_id' => $catId,
            'name'        => 'Sample Item',
            'stock'       => 10,
            'information' => 'This is a sample item.',
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
        ]);

        DB::table('logs')->insert([
            'stockadded' => 10,
            'item_id'    => $itemId,   
            'action'     => 'Created', 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
