<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        return response()->json([
            'status' => 200,
            'data' => $settings
        ], 200);
    }

    public function updateGeneralSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_name' => 'required|max:255',
            'site_email' => 'nullable|max:255',
            'site_phone' => 'nullable|max:255',
            'site_default_currency' => 'required|max:4',
            'site_currency_icon' => 'required|max:4',
            'site_currency_icon_position' => 'required|max:255|in:left,right',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $validatedData = $validator->validate();

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!',
        ], 200);
    }

    public function updateMailSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mail_driver' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
            'mail_from_address' => 'required',
            'mail_receive_address' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $validatedData = $validator->validate();

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail_settings');

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function updateLogoSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'logo' => 'nullable|image|max:2048|mimes:png',
            'footer_logo' => 'nullable|image|max:2048|mimes:png',
            'favicon' => 'nullable|image|max:2048|mimes:png',
            'breadcrumb' => 'nullable|image|max:2048|mimes:png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $updated = false;

        // Get all current settings once
        $settings = Setting::pluck('value', 'key')->toArray();

        // Process Logo
        if ($request->hasFile('logo')) {
            $oldLogo = $settings['logo'] ?? null;
            $image = $request->file('logo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 100);
            $img->toPng()->save(base_path('public/uploads/logo_image/' . $name_gen));
            $save_url = 'uploads/logo_image/' . $name_gen;

            Setting::updateOrCreate(
                ['key' => 'logo'],
                ['value' => $save_url]
            );

            $defaultImages = [
                'frontend/images/logo.png',
            ];

            if ($oldLogo && !in_array($oldLogo, $defaultImages) && file_exists($oldLogo)) {
                unlink($oldLogo);
            }

            $updated = true;
        }

        // Process Footer Logo
        if ($request->hasFile('footer_logo')) {
            $oldFooterLogo = $settings['footer_logo'] ?? null;
            $image = $request->file('footer_logo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 100);
            $img->toPng()->save(base_path('public/uploads/logo_image/' . $name_gen));
            $save_url = 'uploads/logo_image/' . $name_gen;

            Setting::updateOrCreate(
                ['key' => 'footer_logo'],
                ['value' => $save_url]
            );

            $defaultImages = [
                'frontend/images/footer_logo.png',
            ];

            if ($oldFooterLogo && !in_array($oldFooterLogo, $defaultImages) && file_exists($oldFooterLogo)) {
                unlink($oldFooterLogo);
            }

            $updated = true;
        }

        // Process Favicon
        if ($request->hasFile('favicon')) {
            $oldFavicon = $settings['favicon'] ?? null;
            $image = $request->file('favicon');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(35, 35);
            $img->toPng()->save(base_path('public/uploads/logo_image/' . $name_gen));
            $save_url = 'uploads/logo_image/' . $name_gen;

            Setting::updateOrCreate(
                ['key' => 'favicon'],
                ['value' => $save_url]
            );

            $defaultImages = [
                'frontend/images/favicon.png',
            ];

            if ($oldFavicon && !in_array($oldFavicon, $defaultImages) && file_exists($oldFavicon)) {
                unlink($oldFavicon);
            }

            $updated = true;
        }

        // Process Breadcrumb
        if ($request->hasFile('breadcrumb')) {
            $oldBreadcrumb = $settings['breadcrumb'] ?? null;
            $image = $request->file('breadcrumb');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(1500, 300);
            $img->toJpeg(80)->save(base_path('public/uploads/logo_image/' . $name_gen));
            $save_url = 'uploads/logo_image/' . $name_gen;

            Setting::updateOrCreate(
                ['key' => 'breadcrumb'],
                ['value' => $save_url]
            );

            $defaultImages = [
                'frontend/images/counter_bg.jpg',
            ];

            if ($oldBreadcrumb && !in_array($oldBreadcrumb, $defaultImages) && file_exists($oldBreadcrumb)) {
                unlink($oldBreadcrumb);
            }

            $updated = true;
        }

        // Clear cache if any updates were made
        if ($updated) {
            $settingsService = app(SettingsService::class);
            $settingsService->clearCachedSettings();
            Cache::forget('mail_settings');
        }

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function updateAppearanceSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'site_color' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $validatedData = $validator->validate();

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail_settings');

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function updateSeoSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'seo_title' => 'required|max:255',
            'seo_description' => 'nullable|max:600',
            'seo_keywords' => 'nullable'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $validatedData = $validator->validate();

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail_settings');

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function updateGithubSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'github_client_id' => 'required',
            'github_client_secret' => 'required',
            'github_redirect_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $validatedData = $validator->validate();

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail_settings');

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }

    public function updateGoogleSetting(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'google_client_id' => 'required',
            'google_client_secret' => 'required',
            'google_redirect_url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->errors(),
            ], 400);
        }

        $validatedData = $validator->validate();

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail_settings');

        return response()->json([
            'status' => 200,
            'message' => 'Updated Successfully!'
        ], 200);
    }
}
