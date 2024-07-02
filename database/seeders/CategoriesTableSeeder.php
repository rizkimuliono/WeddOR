<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Furniture','image' => 'images/furniture.jpeg'],
            ['name' => 'Decorations','image' => 'images/decoration.png'],
            ['name' => 'Lighting','image' => 'images/lampu.png'],
        ]);

    }
}
