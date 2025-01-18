<?php

namespace App\Services;

use App\Models\PaymentGatewaySetting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class PaymentGatewaySettingService {

    function getSettings() {
        return Cache::rememberForever('gatewaySettings', function(){
            return PaymentGatewaySetting::pluck('value', 'key')->toArray();
        });
    }

    function setGlobalSettings() : void {
        $settings = $this->getSettings();
        Config::set('gatewaySettings', $settings);
    }

    function clearCachedSettings() : void {
        Cache::forget('gatewaySettings');
    }

}
