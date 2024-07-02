<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'level' => 'admin',
                'is_vendor' => false,
                'vendor_name' => null,
                'vendor_email' => null,
                'address' => 'Admin Address',
                'telp' => '123456789',
                'phone' => '987654321',
                'province_id' => 1,
                'city_id' => 1,
                'district_id' => 1,
            ],
            [
                'name' => 'Vendor User',
                'email' => 'vendor@example.com',
                'password' => Hash::make('password'),
                'level' => 'vendor',
                'is_vendor' => true,
                'vendor_name' => 'Vendor 1',
                'vendor_email' => 'vendor1@example.com',
                'address' => 'Vendor Address',
                'telp' => '123456780',
                'phone' => '987654320',
                'province_id' => 2,
                'city_id' => 3,
                'district_id' => 4,
            ],
            [
                'name' => 'Regular User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'level' => 'user',
                'is_vendor' => false,
                'vendor_name' => null,
                'vendor_email' => null,
                'address' => 'User Address',
                'telp' => '123456781',
                'phone' => '9876543211',
                'province_id' => 3,
                'city_id' => 5,
                'district_id' => 6,
            ],
        ]);
    }
}
