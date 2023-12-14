<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Spatie\TranslationLoader\LanguageLine;

class LangComposer
{
    public function compose(View $view): void
    {
        $languageLine = LanguageLine::all();
        $view->with('languageLine', $languageLine);
    }
}
