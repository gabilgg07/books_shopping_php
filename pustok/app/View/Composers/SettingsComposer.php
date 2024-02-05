<?php

namespace App\View\Composers;

use App\Models\Setting;
use Illuminate\View\View;

class SettingsComposer
{
    public function compose(View $view): void
    {
        $settings = Setting::first();
        $view->with('settings', $settings);
    }
}
