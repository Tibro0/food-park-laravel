<?php

namespace Database\Seeders;

use App\Models\Counter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Counter::insert([
            [
                'background' => 'frontend/images/counter_bg2.jpg',
                'counter_icon_one' => 'fas fa-burger-soda',
                'counter_count_one' => '85,000',
                'counter_name_one' => 'customer serve',

                'counter_icon_two' => 'fal fa-hat-chef',
                'counter_count_two' => '120',
                'counter_name_two' => 'Experience Chef',

                'counter_icon_three' => 'far fa-handshake',
                'counter_count_three' => '72,000',
                'counter_name_three' => 'Happy Customer',

                'counter_icon_four' => 'far fa-trophy',
                'counter_count_four' => '30',
                'counter_name_four' => 'winning award',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
