<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('category')?->id;
        return [
            'title' => ['required', 'array'],
            'title.*' => ['max:255', function ($attribute, $value, $fail) use ($modelId) {
                $slug = Str::slug($value);
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = Category::where('id', '!=', $modelId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
                if ($existingTitles) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.unique'));
                }
                if (!trim($value)) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.required'));
                }
            }],
            'image' => ['nullable', 'image', 'mimes:jpg,png,gif,jpeg,svg,webp', 'max:2024'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => 'Image ' . __('validation.image'),
            'image.uploaded' => __('validation.uploaded') . ' 2 Mb',
        ];
    }
}