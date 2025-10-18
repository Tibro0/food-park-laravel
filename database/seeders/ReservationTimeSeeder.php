<?php

namespace Database\Seeders;

use App\Models\ReservationTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReservationTime::insert([
            [
                'start_time' => '12:00 PM',
                'end_time' => '1:00 PM',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '11:00 AM',
                'end_time' => '12:00 PM',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '2:00 PM',
                'end_time' => '3:00 PM',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'start_time' => '3:00 PM',
                'end_time' => '4:00 PM',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
