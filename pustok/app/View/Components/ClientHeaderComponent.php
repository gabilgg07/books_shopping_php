<?php

namespace App\View\Components;

use App\Models\Lang;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ClientHeaderComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $langs = Lang::where('is_deleted', 0)->where('is_active', 1)->get();
        $currentLang = Lang::where('code', LaravelLocalization::getCurrentLocale())->first();
        $user = auth()->user();
        return view('components.client-header-component', compact('langs', 'currentLang', 'user'));
    }
}
