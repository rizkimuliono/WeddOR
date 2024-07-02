<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert([
            ['path' => 'images/meja_set_wedding_1.png', 'product_id' => 1],
            ['path' => 'images/meja_1.png', 'product_id' => 2],
            ['path' => 'images/kursi_1.png', 'product_id' => 3],
            ['path' => 'images/taplak_meja_1.png', 'product_id' => 4],
            ['path' => 'images/bunga_hias_1.jpeg', 'product_id' => 5],
        ]);
    }
}
