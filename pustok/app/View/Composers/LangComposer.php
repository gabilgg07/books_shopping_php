<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Spatie\TranslationLoader\LanguageLine;

class LangComposer
{
    public function compose(View $view): void
    {
        $languageLine = LanguageLine::where('is_deleted', 0)->where('is_active', 1)->get();
        $view->with('languageLine', $languageLine);

        // blade-de cagirmaq ucun kod numune:
        // $languageLine->where('group', 'menu')->where('key','home')->first()->text[LaravelLocalization::getCurrentLocale()];
    }
}
