<?php

namespace App\View\Components;

use App\Models\Category as Model;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ClientCategoriesComponent extends Component
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
        $categories = Model::where('is_deleted', 0)->where('is_active', 1)->get();
        $models = [];
        foreach ($categories as $key => $category) {
            if ($category->parent_id == 0) {
                $data = [
                    'model' => $category,
                    'children' => []
                ];
                if ($category->parent_id == 0) {
                    $data['children'] = $categories->where('parent_id', $category->id);
                }
                $models[] = $data;
            }
        }
        return view('components.client-categories-component', compact('models'));
    }
}