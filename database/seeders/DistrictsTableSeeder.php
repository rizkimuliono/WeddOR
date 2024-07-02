<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('districts')->insert([
            ['name' => 'District A1-1', 'city_id' => 1],
            ['name' => 'District A1-2', 'city_id' => 1],
            ['name' => 'District A2-1', 'city_id' => 2],
            ['name' => 'District B1-1', 'city_id' => 3],
            ['name' => 'District B1-2', 'city_id' => 3],
            ['name' => 'District C1-1', 'city_id' => 5],
        ]);
    }
}
