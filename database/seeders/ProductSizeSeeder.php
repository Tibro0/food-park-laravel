<?php

namespace Database\Seeders;

use App\Models\ProductSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductSize::insert([
            [
                'product_id' => 1,
                'name' => 'Small',
                'price' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'name' => 'Medium',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 1,
                'name' => 'Large',
                'price' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 2,
                'name' => 'Small',
                'price' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'name' => 'Medium',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 2,
                'name' => 'Large',
                'price' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 3,
                'name' => 'Small',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'name' => 'Medium',
                'price' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 3,
                'name' => 'Large',
                'price' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 4,
                'name' => 'Small',
                'price' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'name' => 'Medium',
                'price' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 4,
                'name' => 'Large',
                'price' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 5,
                'name' => 'Small',
                'price' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'name' => 'Medium',
                'price' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 5,
                'name' => 'Large',
                'price' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 6,
                'name' => 'Small',
                'price' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'name' => 'Medium',
                'price' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 6,
                'name' => 'Large',
                'price' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'product_id' => 7,
                'name' => 'Small',
                'price' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'name' => 'Medium',
                'price' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'product_id' => 7,
                'name' => 'Large',
                'price' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
