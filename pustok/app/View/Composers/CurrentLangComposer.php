<?php

namespace App\View\Composers;

use App\Models\Lang;
use Illuminate\View\View;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CurrentLangComposer
{
    public function compose(View $view): void
    {
        $langs = Lang::where('is_deleted', 0)->where('is_active', 1)->get();
        $currentLang = Lang::where('code', LaravelLocalization::getCurrentLocale())->where('is_deleted', 0)->where('is_active', 1)->first();
        $view->with('currentLang', $currentLang);
        $view->with('langs', $langs);
    }
}