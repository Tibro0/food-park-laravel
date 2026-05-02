<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGatewaySetting;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Services\PaymentGatewaySettingService;
use Illuminate\Support\Facades\Validator;

class PaymentGatewaySettingController extends Controller
{
    public function index()
    {
        $paymentGateway = PaymentGatewaySetting::pluck('value', 'key');
        return response()->json([
            'status' => 200,
            'data' => $paymentGateway
        ], 200);
    }

    public function paypalSettingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'paypal_status' => 'required|boolean',
            'paypal_account_mode' => 'required|in:sandbox,live',
            'paypal_country' => 'required',
            'paypal_currency' => 'required',
            'paypal_rate' => 'required|numeric',
            'paypal_api_key' => 'required',
            'paypal_secret_key' => 'required',
            'paypal_app_id' => 'required',
            'paypal_logo' => 'nullable|image|max:2048|mimes:png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $validatedData = $validator->validated();


        if ($request->hasFile('paypal_logo')) {
            $oldLogoEntry = PaymentGatewaySetting::where('key', 'paypal_logo')->first();
            $oldImagePath = $oldLogoEntry ? $oldLogoEntry->value : null;

            $image = $request->file('paypal_logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image);
            $img = $img->resize(114, 60);
            $save_path = public_path('uploads/payment_gateway_logo_image/' . $name_gen);
            $img->save($save_path, quality: 80);
            $save_url = 'uploads/payment_gateway_logo_image/' . $name_gen;
            $validatedData['paypal_logo'] = $save_url;

            $defaultImages = ['frontend/images/pay_1.jpg'];
            if ($oldImagePath && !in_array($oldImagePath, $defaultImages) && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
        }

        foreach ($validatedData as $key => $value) {
            PaymentGatewaySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }


        $settingsService = app(PaymentGatewaySettingService::class);
        $settingsService->clearCachedSettings();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function stripeSettingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stripe_status' => 'required|boolean',
            'stripe_country' => 'required',
            'stripe_currency' => 'required',
            'stripe_rate' => 'required|numeric',
            'stripe_api_key' => 'required',
            'stripe_secret_key' => 'required',
            'stripe_logo' => 'nullable|image|max:2048|mimes:png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $validatedData = $validator->validated();


        if ($request->hasFile('stripe_logo')) {
            $oldLogoEntry = PaymentGatewaySetting::where('key', 'stripe_logo')->first();
            $oldImagePath = $oldLogoEntry ? $oldLogoEntry->value : null;

            $image = $request->file('stripe_logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image);
            $img = $img->resize(114, 60);
            $save_path = public_path('uploads/payment_gateway_logo_image/' . $name_gen);
            $img->save($save_path, quality: 80);
            $save_url = 'uploads/payment_gateway_logo_image/' . $name_gen;
            $validatedData['stripe_logo'] = $save_url;

            $defaultImages = ['frontend/images/pay_7.png'];
            if ($oldImagePath && !in_array($oldImagePath, $defaultImages) && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
        }

        foreach ($validatedData as $key => $value) {
            PaymentGatewaySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }


        $settingsService = app(PaymentGatewaySettingService::class);
        $settingsService->clearCachedSettings();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function razorpaySettingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'razorpay_status' => 'required|boolean',
            'razorpay_country' => 'required',
            'razorpay_currency' => 'required',
            'razorpay_rate' => 'required|numeric',
            'razorpay_api_key' => 'required',
            'razorpay_secret_key' => 'required',
            'razorpay_logo' => 'nullable|image|max:2048|mimes:png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors()
            ], 400);
        }

        $validatedData = $validator->validated();


        if ($request->hasFile('razorpay_logo')) {
            $oldLogoEntry = PaymentGatewaySetting::where('key', 'razorpay_logo')->first();
            $oldImagePath = $oldLogoEntry ? $oldLogoEntry->value : null;

            $image = $request->file('razorpay_logo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image);
            $img = $img->resize(114, 60);
            $save_path = public_path('uploads/payment_gateway_logo_image/' . $name_gen);
            $img->save($save_path, quality: 80);
            $save_url = 'uploads/payment_gateway_logo_image/' . $name_gen;
            $validatedData['razorpay_logo'] = $save_url;

            $defaultImages = ['frontend/images/pay_8.webp'];
            if ($oldImagePath && !in_array($oldImagePath, $defaultImages) && file_exists(public_path($oldImagePath))) {
                unlink(public_path($oldImagePath));
            }
        }

        foreach ($validatedData as $key => $value) {
            PaymentGatewaySetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }


        $settingsService = app(PaymentGatewaySettingService::class);
        $settingsService->clearCachedSettings();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }
}
