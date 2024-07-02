<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Meja Set Wedding',
                'description' => 'Satu set meja untuk pernikahan',
                'price' => 500000,
                'category_id' => 1,
                'vendor_id' => 2,
                'parent_id' => null,
            ],
            [
                'name' => 'Meja',
                'description' => 'Meja untuk set pernikahan',
                'price' => 200000,
                'category_id' => 1,
                'vendor_id' => 2,
                'parent_id' => 1,
            ],
            [
                'name' => 'Kursi',
                'description' => 'Kursi untuk set pernikahan',
                'price' => 100000,
                'category_id' => 1,
                'vendor_id' => 2,
                'parent_id' => 1,
            ],
            [
                'name' => 'Taplak Meja',
                'description' => 'Taplak meja untuk set pernikahan',
                'price' => 50000,
                'category_id' => 2,
                'vendor_id' => 2,
                'parent_id' => 1,
            ],
            [
                'name' => 'Bunga Hias',
                'description' => 'Bunga hias untuk dekorasi pernikahan',
                'price' => 300000,
                'category_id' => 2,
                'vendor_id' => 2,
                'parent_id' => 1,
            ],
        ]);
    }
}
