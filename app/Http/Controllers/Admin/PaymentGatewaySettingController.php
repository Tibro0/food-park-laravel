<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGatewaySetting;
use App\Services\PaymentGatewaySettingService;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PaymentGatewaySettingController extends Controller
{
    public function index(){
        $paymentGateway = PaymentGatewaySetting::pluck('value', 'key');
        return view('admin.payment-setting.index', compact('paymentGateway'));
    }

    public function paypalSettingUpdate(Request $request){
        $validatedData = $request->validate([
            'paypal_status' => ['required', 'boolean'],
            'paypal_account_mode' => ['required', 'in:sandbox,live'],
            'paypal_country' => ['required'],
            'paypal_currency' => ['required'],
            'paypal_rate' => ['required', 'numeric'],
            'paypal_api_key' => ['required'],
            'paypal_secret_key' => ['required'],
            'paypal_app_id' => ['required'],
        ]);

        $oldImage = $request->old_paypal_logo_image;
        if($request->file('paypal_logo')){
            $request->validate([
                'paypal_logo' => ['nullable', 'image']
            ]);

            $image = $request->file('paypal_logo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(114,60);
            $img->toJpeg(80)->save(base_path('public/uploads/payment_gateway_logo_image/'.$name_gen));
            $save_url = 'uploads/payment_gateway_logo_image/'.$name_gen;

            PaymentGatewaySetting::updateOrCreate(
                ['key' => 'paypal_logo'],
                ['value' => $save_url]
            );

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        foreach($validatedData as $key => $value){
            PaymentGatewaySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(PaymentGatewaySettingService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('Updated Successfully!');
        return redirect()->back();
    }

    public function stripeSettingUpdate(Request $request){
        $validatedData = $request->validate([
            'stripe_status' => ['required', 'boolean'],
            'stripe_country' => ['required'],
            'stripe_currency' => ['required'],
            'stripe_rate' => ['required', 'numeric'],
            'stripe_api_key' => ['required'],
            'stripe_secret_key' => ['required'],
        ]);

        $oldImage = $request->old_stripe_logo_image;
        if($request->file('stripe_logo')){
            $request->validate([
                'stripe_logo' => ['nullable', 'image']
            ]);

            $image = $request->file('stripe_logo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(114,60);
            $img->toJpeg(80)->save(base_path('public/uploads/payment_gateway_logo_image/'.$name_gen));
            $save_url = 'uploads/payment_gateway_logo_image/'.$name_gen;

            PaymentGatewaySetting::updateOrCreate(
                ['key' => 'stripe_logo'],
                ['value' => $save_url]
            );

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        foreach($validatedData as $key => $value){
            PaymentGatewaySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(PaymentGatewaySettingService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('Updated Successfully!');
        return redirect()->back();
    }
}
