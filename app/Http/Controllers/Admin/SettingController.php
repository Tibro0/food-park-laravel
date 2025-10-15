<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function updateGeneralSetting(Request $request)
    {
        $validatedData = $request->validate([
            'site_name' => ['required', 'max:255'],
            'site_email' => ['nullable', 'max:255'],
            'site_phone' => ['nullable', 'max:255'],
            'site_default_currency' => ['required', 'max:4'],
            'site_currency_icon' => ['required', 'max:4'],
            'site_currency_icon_position' => ['required', 'max:255'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();

        toastr()->success('Updated Successfully!');
        return redirect()->back();
    }

    public function UpdateMailSetting(Request $request)
    {
        $validatedData = $request->validate([
            'mail_driver' => ['required'],
            'mail_host' => ['required'],
            'mail_port' => ['required'],
            'mail_username' => ['required'],
            'mail_password' => ['required'],
            'mail_from_address' => ['required'],
            'mail_receive_address' => ['required'],
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail_settings');

        toastr()->success('Updated Successfully!');
        return redirect()->back();
    }

    public function UpdateLogoSetting(Request $request)
    {
        $request->validate([
            'logo' => ['nullable', 'image', 'max:1000'],
            'footer_logo' => ['nullable', 'image', 'max:1000'],
            'favicon' => ['nullable', 'image', 'max:1000'],
            'breadcrumb' => ['nullable', 'image', 'max:1000'],
        ]);

        $oldLogo = $request->old_logo;
        if ($request->file('logo')) {
            $image = $request->file('logo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 100);
            $img->toJpeg(80)->save(base_path('public/uploads/logo_image/' . $name_gen));
            $save_url = 'uploads/logo_image/' . $name_gen;

            Setting::updateOrCreate(
                ['key' => 'logo'],
                ['value' => $save_url]
            );

            if (file_exists($oldLogo)) {
                unlink($oldLogo);
            }

            $settingsService = app(SettingsService::class);
            $settingsService->clearCachedSettings();
            Cache::forget('mail_settings');

            toastr()->success('Updated Successfully!');
            return redirect()->back();
        }

        $oldFootedLogo = $request->old_footer_logo;
        if ($request->file('footer_logo')) {
            $image = $request->file('footer_logo');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(300, 100);
            $img->toPng(indexed: true)->save(base_path('public/uploads/logo_image/' . $name_gen));
            $save_url = 'uploads/logo_image/' . $name_gen;

            Setting::updateOrCreate(
                ['key' => 'footer_logo'],
                ['value' => $save_url]
            );

            if (file_exists($oldFootedLogo)) {
                unlink($oldFootedLogo);
            }

            $settingsService = app(SettingsService::class);
            $settingsService->clearCachedSettings();
            Cache::forget('mail_settings');

            toastr()->success('Updated Successfully!');
            return redirect()->back();
        }

        $oldFavicon = $request->old_favicon;
        if ($request->file('favicon')) {
            $image = $request->file('favicon');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(35, 35);
            $img->toPng(indexed: true)->save(base_path('public/uploads/logo_image/' . $name_gen));
            $save_url = 'uploads/logo_image/' . $name_gen;

            Setting::updateOrCreate(
                ['key' => 'favicon'],
                ['value' => $save_url]
            );

            if (file_exists($oldFavicon)) {
                unlink($oldFavicon);
            }

            $settingsService = app(SettingsService::class);
            $settingsService->clearCachedSettings();
            Cache::forget('mail_settings');

            toastr()->success('Updated Successfully!');
            return redirect()->back();
        }

        $oldBreadcrumb = $request->old_breadcrumb;
        if ($request->file('breadcrumb')) {
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

            if (file_exists($oldBreadcrumb)) {
                unlink($oldBreadcrumb);
            }

            $settingsService = app(SettingsService::class);
            $settingsService->clearCachedSettings();
            Cache::forget('mail_settings');

            toastr()->success('Updated Successfully!');
            return redirect()->back();
        }
    }

    public function UpdateAppearanceSetting(Request $request)
    {
        $validatedData = $request->validate([
            'site_color' => ['required']
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail_settings');

        toastr()->success('Updated Successfully!');
        return redirect()->back();
    }

    public function UpdateSeoSetting(Request $request)
    {
        $validatedData = $request->validate([
            'seo_title' => ['required', 'max:255'],
            'seo_description' => ['nullable', 'max:600'],
            'seo_keywords' => ['nullable']
        ]);

        foreach ($validatedData as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $settingsService = app(SettingsService::class);
        $settingsService->clearCachedSettings();
        Cache::forget('mail_settings');

        toastr()->success('Updated Successfully!');
        return redirect()->back();
    }
}
