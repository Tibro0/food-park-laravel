<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::insert([
            [
                'image' => 'frontend/images/comment_img_1.png',
                'name' => 'Isita Islam',
                'title' => 'Nyc Usa',
                'review' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam',
                'rating' => 5,
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/comment_img_2.png',
                'name' => 'Sumon Mahmud',
                'title' => 'Nyc Usa',
                'review' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam',
                'rating' => 5,
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/client_img_1.jpg',
                'name' => 'Israt Jahan',
                'title' => 'Nyc Usa',
                'review' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam',
                'rating' => 5,
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/client_img_3.jpg',
                'name' => 'Payel Sarkar',
                'title' => 'Nyc Usa',
                'review' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut accusamus praesentium quaerat nihil magnam a porro eaque numquam',
                'rating' => 5,
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
