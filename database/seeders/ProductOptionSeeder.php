<?php

namespace Database\Seeders;

use App\Models\ProductOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductOption::insert([
            [
                'product_id' => 1,
                'name' => 'Coca-Cola',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'name' => '7up',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'name' => 'Sprite',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 2,
                'name' => 'Coca-Cola',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'name' => '7up',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'name' => 'Sprite',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 3,
                'name' => 'Coca-Cola',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'name' => '7up',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'name' => 'Sprite',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 4,
                'name' => 'Coca-Cola',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'name' => '7up',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'name' => 'Sprite',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 5,
                'name' => 'Coca-Cola',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'name' => '7up',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'name' => 'Sprite',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 6,
                'name' => 'Coca-Cola',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'name' => '7up',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'name' => 'Sprite',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 7,
                'name' => 'Coca-Cola',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'name' => '7up',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'name' => 'Sprite',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
