<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialLink::insert([
            [
                'icon' => 'fab fa-facebook-f',
                'name' => 'Facebook',
                'link' => 'https://www.youtube.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-linkedin-in',
                'name' => 'Linkedin',
                'link' => 'https://www.youtube.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-twitter',
                'name' => 'Twitter',
                'link' => 'https://www.youtube.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-behance',
                'name' => 'Behance',
                'link' => 'https://www.youtube.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-instagram',
                'name' => 'Instagram',
                'link' => 'https://www.youtube.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'icon' => 'fab fa-google-plus-g',
                'name' => 'Google Plus',
                'link' => 'https://www.youtube.com/',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
