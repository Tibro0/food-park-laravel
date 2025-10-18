<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::insert([
            [
                'phone_one' => '+1347-430-9510',
                'phone_two' => '+9658745554002',
                'mail_one' => 'websolutionus@gmail.com',
                'mail_two' => 'example@gmail.com',
                'address' => '7232 Broadway Suite 308, Jackson Heights, 11372, NY, United States',
                'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116833.8318789773!2d90.33728815181978!3d23.780975728157546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2z4Kai4Ka-4KaV4Ka-!5e0!3m2!1sbn!2sbd!4v1737917590327!5m2!1sbn!2sbd',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
