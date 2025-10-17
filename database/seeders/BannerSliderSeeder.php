<?php

namespace Database\Seeders;

use App\Models\BannerSlider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BannerSlider::insert([
            [
                'banner' => 'frontend/images//offer_slider_1.png',
                'title' => 'Red Chicken',
                'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
                'url' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images//offer_slider_2.png',
                'title' => 'Red Chicken',
                'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
                'url' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images//offer_slider_3.png',
                'title' => 'Red Chicken',
                'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
                'url' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images//offer_slider_4.png',
                'title' => 'Red Chicken',
                'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
                'url' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images//offer_slider_1.png',
                'title' => 'Red Chicken',
                'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
                'url' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images//offer_slider_2.png',
                'title' => 'Red Chicken',
                'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
                'url' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images//offer_slider_3.png',
                'title' => 'Red Chicken',
                'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
                'url' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'banner' => 'frontend/images//offer_slider_4.png',
                'title' => 'Red Chicken',
                'sub_title' => 'Lorem ipsum dolor sit amet consectetur.',
                'url' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
