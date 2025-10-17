<?php

namespace Database\Seeders;

use App\Models\ProductGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductGallery::insert([
            [
                'product_id' => 1,
                'image' => 'frontend/images/menu4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'image' => 'frontend/images/menu6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'image' => 'frontend/images/menu7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'image' => 'frontend/images/menu8.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'image' => 'frontend/images/menu1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'image' => 'frontend/images/menu2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'image' => 'frontend/images/menu5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
