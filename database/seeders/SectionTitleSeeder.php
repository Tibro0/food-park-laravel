<?php

namespace Database\Seeders;

use App\Models\SectionTitle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionTitle::insert([
            [
                'key' => 'why_choose_top_title',
                'value' => 'why choose us',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'why_choose_main_title',
                'value' => 'why choose us',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'why_choose_sub_title',
                'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'daily_offer_top_title',
                'value' => 'daily offer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'daily_offer_main_title',
                'value' => 'up to 75% off for this day',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'daily_offer_sub_title',
                'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'chef_top_title',
                'value' => 'our team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'chef_main_title',
                'value' => 'meet our expert chefs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'chef_sub_title',
                'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'testimonial_top_title',
                'value' => 'testimonial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'testimonial_main_title',
                'value' => 'our customar feedbacks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'testimonial_sub_title',
                'value' => 'Objectively pontificate quality models before intuitive information. Dramatically recaptiualize multifunctional materials.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
