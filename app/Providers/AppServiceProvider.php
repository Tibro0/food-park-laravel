<?php

namespace App\Providers;

use App\Events\OrderPaymentUpdateEvent;
use App\Events\OrderPlacedNotificationEvent;
use App\Listeners\OrderPaymentUpdateListener;
use App\Listeners\OrderPlacedNotificationListener;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Event::listen(
            OrderPaymentUpdateEvent::class,
            OrderPaymentUpdateListener::class,
            OrderPlacedNotificationEvent::class,
            OrderPlacedNotificationListener::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
