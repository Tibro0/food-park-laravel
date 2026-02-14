<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            [
                'key' => 'site_name',
                'value' => 'Food Park',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_default_currency',
                'value' => 'USD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_currency_icon',
                'value' => '$',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_currency_icon_position',
                'value' => 'left',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_email',
                'value' => 'faysaltibro@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_phone',
                'value' => '01712261035',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_driver',
                'value' => 'smtp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_host',
                'value' => 'sandbox.smtp.mailtrap.io',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_port',
                'value' => '2525',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_username',
                'value' => '82b060d0bdcdae',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_password',
                'value' => 'd68da9c95e3655',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_from_address',
                'value' => 'faysaltibro@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_receive_address',
                'value' => 'faysaltibro@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'logo',
                'value' => 'frontend/images/logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'footer_logo',
                'value' => 'frontend/images/footer_logo.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'favicon',
                'value' => 'frontend/images/favicon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'breadcrumb',
                'value' => 'frontend/images/counter_bg.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_color',
                'value' => '#d14141',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'seo_title',
                'value' => 'seo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'seo_description',
                'value' => 'seo description',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'seo_keywords',
                'value' => 'food,park',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'github_client_id',
                'value' => 'Github Client ID',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'github_client_secret',
                'value' => 'Github Client Secret',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'github_redirect_url',
                'value' => 'http://127.0.0.1:8000/auth/github-callback',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'google_client_id',
                'value' => 'Google Client ID',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'google_client_secret',
                'value' => 'Google Client Secret',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'google_redirect_url',
                'value' => 'http://127.0.0.1:8000/auth/google-callback',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
