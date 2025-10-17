<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::insert([
            [
                'name' => 'Flat 50',
                'code' => 'FLAT50',
                'quantity' => 100,
                'min_purchase_amount' => 100,
                'expire_date' => '2030-12-30',
                'discount_type' => 'amount',
                'discount' => 50,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'P10',
                'code' => 'P10',
                'quantity' => 100,
                'min_purchase_amount' => 50,
                'expire_date' => '2030-12-30',
                'discount_type' => 'percent',
                'discount' => 10,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
