<?php

namespace App\Http\Requests\admin;

use App\Models\Book;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('book')?->id;

        return [
            'title' => ['required', 'array'],
            'title.*' => ['max:255', function ($attribute, $value, $fail) use ($modelId) {
                $slug = Str::slug($value);
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = Book::where('id', '!=', $modelId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
                if ($existingTitles) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.unique'));
                }
                if (!trim($value)) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.required'));
                }
            }],
            'short_desc' => ['required', 'array'],
            'short_desc.*' => [function ($attribute, $value, $fail) use ($modelId) {
                $slug = Str::slug($value);
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = Book::where('id', '!=', $modelId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
                if ($existingTitles) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.unique'));
                }
                if (!trim($value)) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.required'));
                }
            }],
            'long_desc' => ['required', 'array'],
            'long_desc.*' => [function ($attribute, $value, $fail) use ($modelId) {
                $slug = Str::slug($value);
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = Book::where('id', '!=', $modelId)->whereJsonContains('slug->' . $keyValue, $slug)->exists();
                if ($existingTitles) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.unique'));
                }
                if (!trim($value)) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.required'));
                }
            }],
            'category_id' => ['required'],
            'count' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric'],
            'images' => ($modelId ? 'nullable' : 'required') . '|array',
            'images.*' => 'image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
            'is_main' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'max' => __('validation.max'),
            'category_id.required' => 'Category ' . __('validation.required'),
            'count.required' => 'Caunt ' . __('validation.required'),
            'count.min' => __('validation.min_numeric') . ': :min !',
            'price.required' => 'Price ' . __('validation.required'),
            'images.required' => 'Images ' . __('validation.required'),
            'image' => __('validation.image', ['attribute' => 'image', 'values' => 'jpg, png, gif, jpeg, svg, webp']),
            // 'mimes' => __('validation.mimes', ['attribute' => 'image', 'values' => 'jpg, png, gif, jpeg, svg, webp']),
            '*.uploaded' => __('validation.uploaded') . ' 2 Mb',
            'is_main.required' => 'Main image ' . __('validation.required'),
        ];
    }
}
