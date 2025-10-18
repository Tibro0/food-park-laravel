<?php

namespace Database\Seeders;

use App\Models\AppDownloadSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppDownloadSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AppDownloadSection::insert([
            [
                'image' => 'frontend/images/download_img.png',
                'title' => 'Download Our Mobile Apps',
                'short_description' => 'Discover a world of flavour at your fingertips. Download our app for exclusive deals, easy table booking, and seamless ordering for delivery or collection. Your favourite meals are just a tap away.',
                'play_store_link' => 'http://127.0.0.1:8000/',
                'apple_store_link' => 'http://127.0.0.1:8000/',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
