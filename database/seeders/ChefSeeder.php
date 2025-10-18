<?php

namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chef::insert([
            [
                'image' => 'frontend/images/chef_1.jpg',
                'name' => 'Ismat Joha',
                'title' => 'Senior Chef',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/chef_2.jpg',
                'name' => 'Arun Chandra',
                'title' => 'Senior Chef',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/chef_3.jpg',
                'name' => 'Isita Rahman',
                'title' => 'Senior Chef',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/chef_4.jpg',
                'name' => 'Khandakar Rashed',
                'title' => 'Junior Chef',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'frontend/images/chef_5.jpg',
                'name' => 'Naurin Nipu',
                'title' => 'Junior Chef',
                'show_at_home' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
