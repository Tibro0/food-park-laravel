<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class CustomMailServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $mailSetting = Cache::rememberForever('mail_settings', function () {
            $key = ['mail_driver', 'mail_host', 'mail_port', 'mail_username', 'mail_password', 'mail_from_address', 'mail_receive_address', 'github_client_id', 'github_client_secret', 'github_redirect_url', 'google_client_id', 'google_client_secret', 'google_redirect_url'];

            return Setting::whereIn('key', $key)->pluck('value', 'key')->toArray();
        });

        if ($mailSetting) {
            Config::set('mail.mailers.smtp.host', $mailSetting['mail_host']);
            Config::set('mail.mailers.smtp.port', $mailSetting['mail_port']);
            Config::set('mail.mailers.smtp.username', $mailSetting['mail_username']);
            Config::set('mail.mailers.smtp.password', $mailSetting['mail_password']);
            Config::set('mail.from.address', $mailSetting['mail_from_address']);

            Config::set('services.github.client_id', $mailSetting['github_client_id']);
            Config::set('services.github.client_secret', $mailSetting['github_client_secret']);
            Config::set('services.github.redirect', $mailSetting['github_redirect_url']);
        }
    }
}
