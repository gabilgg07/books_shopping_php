<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lang;
use App\Models\Setting;
use App\Services\DataService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct(private DataService $dataService)
    {
        $settings = Setting::first();
        if (!$settings) {
            $data = [
                'logo_image' => 'client/assets/image/logo.png',
                'logo_footer_image' => 'client/assets/image/logo.png',
                'phone' => '+994-123456789',
                'address' => 'Example Street 98, HH2 BacHa, New York, USA',
                'email' => 'suport@pustok.com',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://twitter.com/',
                'google_plus' => 'https://myaccount.google.com/profile',
                'youtube' => 'https://www.youtube.com/',
                'instagram' => 'https://www.instagram.com/',
                'copy_heading' => [
                    'en' => 'Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam vel magna volutpat, posuere eros',
                    'ru' => 'Ru Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam vel magna volutpat, posuere eros',
                    'az' => ' Az Suspendisse in auctor augue. Cras fermentum est ac fermentum tempor. Etiam vel magna volutpat, posuere eros',
                ],
                'copy_text' => [
                    'en' => 'Copyright © ' . date('Y') . ' Pustok. All Right Reserved.
                    <br>
                    Design By Pustok',
                    'ru' => 'Copyright © Ru ' . date('Y') . ' Pustok. All Right Reserved.
                    <br>
                    Design By Pustok',
                    'az' => 'Copyright © Az ' . date('Y') . ' Pustok. All Right Reserved.
                    <br>
                    Design By Pustok',
                ],
                'location_title' => [
                    'en' => 'Location & Details',
                    'ru' => 'Location & Details Ru',
                    'az' => 'Location & Details Az',
                ],
                'location_desc' => [
                    'en' => 'It is a long established fact that readewill be distracted by the readable content of a page when looking at ilayout.',
                    'ru' => 'Ru It is a long established fact that readewill be distracted by the readable content of a page when looking at ilayout.',
                    'az' => 'Az It is a long established fact that readewill be distracted by the readable content of a page when looking at ilayout.',
                ],
            ];

            $created = Setting::create($data);
            if (!$created) {
                dd('Failed to create settings');
            }
        }
    }

    public function index()
    {
        $settings = Setting::first();
        if (!$settings) {
            return abort(404);
        }
        $colors = $this->dataService->colorsArray;
        $copy_heading = $settings->getTranslations('copy_heading');
        $copy_text = $settings->getTranslations('copy_text');
        $location_title = $settings->getTranslations('location_title');
        $location_desc = $settings->getTranslations('location_desc');
        return view('admin.settings.index', compact('settings', 'colors', 'copy_heading', 'copy_text', 'location_title', 'location_desc'));
    }

    public function edit()
    {
        $model = Setting::first();
        if (!$model) {
            return abort(404);
        }

        $langs = Lang::where('is_deleted', 0)->where('is_active', 1)->get();
        $copy_heading = $model->getTranslations('copy_heading');
        $copy_text = $model->getTranslations('copy_text');
        $location_title = $model->getTranslations('location_title');
        $location_desc = $model->getTranslations('location_desc');

        return view('admin.settings.edit', compact('model', 'langs', 'copy_heading', 'copy_text', 'location_title', 'location_desc'));
    }

    public function update(Request $request)
    {
        $settings = Setting::first();
        if (!$settings) {
            return abort(404);
        }

        $data = $request->except('_token');
        $data['is_active'] = $request->is_active ? 1 : 0;
        $updated = $settings->update($data);

        if (!$updated) {
            return redirect()->back()
                ->with('type', 'danger')
                ->with('message', "Failed to update settings!");
        }

        if ($request->file()) {
            if ($settings->logo_image && file_exists(public_path($settings->logo_image))) {
                // unlink(public_path($settings->logo_image));
            }
            if ($settings->logo_footer_image && file_exists(public_path($settings->logo_footer_image))) {
                // unlink(public_path($settings->logo_image));
            }
            if ($settings->logo_image) {
                $fileExtension = $request->logo_image->extension();
                $imgName =  'logo_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
                $imgPath = $request->file('logo_image')->storeAs('uploads/admin/settings', $imgName, 'public');
                $settings->logo_image = '/storage/' . $imgPath;
            }
            if ($settings->logo_footer_image) {
                $fileExtension = $request->logo_footer_image->extension();
                $imgName =  'logo_footer_' . time() . sprintf("%03s", rand(0, 999)) . '.' . $fileExtension;
                $imgPath = $request->file('logo_footer_image')->storeAs('uploads/admin/settings', $imgName, 'public');
                $settings->logo_footer_image = '/storage/' . $imgPath;
            }
            $settings->save();
        }

        return redirect()->route('manager.settings.index')
            ->with('type', 'success')
            ->with('message', 'Settings has been updated.');
    }
}
