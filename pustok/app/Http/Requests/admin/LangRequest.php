<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class LangRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('lang')?->id;
        return [
            'code' => ['required', 'max:3', !$modelId ? 'unique:langs' : 'unique:langs' . ',code,' . $modelId],
            'country' => ['required', !$modelId ? 'unique:langs' : 'unique:langs' . ',country,' . $modelId],
            'image' => 'nullable|image|mimes:jpg,png,gif,jpeg,svg,webp|max:2024',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Code ' . __('validation.required'),
            'code.unique' => 'Code ' . __('validation.unique'),
            'country.required' => 'Country ' . __('validation.required'),
            'country.unique' => 'Country ' . __('validation.unique'),
            'image.image' => 'Image ' . __('validation.image'),
            'image.uploaded' => __('validation.uploaded') . ' 2 Mb',
        ];
    }
}