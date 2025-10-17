<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::insert([
            [
                'user_id' => 2,
                'delivery_area_id' => 3,
                'first_name' => 'MD. Faysal Hossain',
                'last_name' => 'Tibro',
                'email' => 'faysaltibro@gmail.com',
                'phone' => '01734449023',
                'address' => 'Adabor, Dhaka-1207',
                'type' => 'home',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
