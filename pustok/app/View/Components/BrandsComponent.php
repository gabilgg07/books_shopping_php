<?php

namespace App\View\Components;

use App\Models\Brand as Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BrandsComponent extends Component
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
        $component_model  = [];
        $component_model['models'] = Model::where('is_deleted', 0)->where('is_active', 1)->get();
        return view('components.brands-component', compact('component_model'));
    }
}