<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::insert([
            [
                'image' => 'frontend/images/about_chef.jpg',
                'title' => 'About Company',
                'main_title' => 'Helathy Foods Provider',
                'description' => '<p style="margin: 15px 0px; padding: 0px; font-size: 16px; color: rgb(73, 73, 73); font-family: Barlow, sans-serif;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate aspernatur molestiae minima pariatur consequatur voluptate sapiente deleniti soluta, animi ab necessitatibus optio similique quasi fuga impedit corrupti obcaecati neque consequatur sequi.</p><ul style="margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; display: flex; flex-wrap: wrap; color: rgb(73, 73, 73); font-family: Barlow, sans-serif; font-size: 16px;"><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Delicious & Healthy Foods</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Spacific Family & Kids Zone</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Best Price & Offers</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Made By Fresh Ingredients</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Music & Other Facilities</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Delicious & Healthy Foods</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Spacific Family & Kids Zone</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Best Price & Offers</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Made By Fresh Ingredients</li><li style="margin: 15px 0px 0px; padding: 0px 0px 0px 30px; list-style: none; text-transform: capitalize; color: var(--colorBlack); width: 318px; position: relative;">Delicious & Healthy Foods</li></ul>',
                'video_link' => 'https://www.youtube.com/',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
