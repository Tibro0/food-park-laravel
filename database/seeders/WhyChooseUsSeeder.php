<?php

namespace Database\Seeders;

use App\Models\WhyChooseUs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WhyChooseUs::insert([
            [
                'icon' => 'fab fa-snapchat-ghost',
                'title' => 'Fast Serve On Table',
                'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-cocktail',
                'title' => 'Fresh Healthy Foods',
                'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fas fa-percent',
                'title' => 'Discount Voucher',
                'short_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, debitis expedita.',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
