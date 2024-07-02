<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cities')->insert([
            ['name' => 'City A1', 'province_id' => 1],
            ['name' => 'City A2', 'province_id' => 1],
            ['name' => 'City B1', 'province_id' => 2],
            ['name' => 'City B2', 'province_id' => 2],
            ['name' => 'City C1', 'province_id' => 3],
            ['name' => 'City C2', 'province_id' => 3],
        ]);
    }
}
