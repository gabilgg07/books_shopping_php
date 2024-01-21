<?php

namespace App\Http\Requests\admin\categories;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        $categoryId = $this->route('category')?->id;
        return [
            'title' => ['required', 'array'],
            'title.*' => ['max:255', function ($attribute, $value, $fail) use ($categoryId) {
                $slug = Str::slug($value);
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = Category::where('id', '!=', $categoryId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
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
            // 'image.image' => 'Image ' . __('validation.image'),
            'image' => __('validation.image', ['attribute' => 'image', 'values' => 'jpg, png, gif, jpeg, svg, webp']),
            'image.uploaded' => __('validation.uploaded') . ' 2 Mb',
        ];
    }
}