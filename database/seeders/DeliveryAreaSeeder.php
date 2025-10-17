<?php

namespace Database\Seeders;

use App\Models\DeliveryArea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryArea::insert([
            [
                'area_name' => 'Mohammadpur',
                'min_delivery_time' => '15m',
                'max_delivery_time' => '20m',
                'delivery_fee' => 10,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'area_name' => 'Dhanmondi',
                'min_delivery_time' => '20m',
                'max_delivery_time' => '30m',
                'delivery_fee' => 20,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'area_name' => 'Adabor',
                'min_delivery_time' => '5m',
                'max_delivery_time' => '10m',
                'delivery_fee' => 5,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
