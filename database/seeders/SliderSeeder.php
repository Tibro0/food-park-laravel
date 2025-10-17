<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::insert([
            [
                'image' => 'frontend/images/slider_img_1.png',
                'offer' => '35% off',
                'title' => 'Different spice for a Different taste',
                'sub_title' => 'Fast Food & Restaurants',
                'short_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.',
                'button_link' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/slider_img_2.png',
                'offer' => '70% off',
                'title' => 'Eat healthy. Stay healthy.',
                'sub_title' => 'Fast Food & Restaurants',
                'short_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.',
                'button_link' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/slider_img_3.png',
                'offer' => '50% off',
                'title' => 'Great food. Tastes good.',
                'sub_title' => 'Fast Food & Restaurants',
                'short_description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum fugit minima et debitis ut distinctio optio qui voluptate natus.',
                'button_link' => 'http://127.0.0.1:8000/products',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
