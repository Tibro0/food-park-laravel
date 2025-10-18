<?php

namespace Database\Seeders;

use App\Models\FooterInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FooterInfo::insert([
            [
                'short_info' => 'There are many variations of Lorem Ipsum available, but the majority have suffered.',
                'address' => '7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States',
                'phone' => '+1347-430-9510',
                'email' => 'websolutionus@gmail.com',
                'copyright' => 'Copyright 2022 FoodPark All Rights Reserved.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
