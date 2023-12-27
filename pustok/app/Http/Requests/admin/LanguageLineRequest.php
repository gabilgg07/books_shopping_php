<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class LanguageLineRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'group' => 'required',
            'key' => 'required',
            'text' => ['required', 'array'],
            'text.*' => ['max:255', function ($attribute, $value, $fail) {
                if (!trim($value)) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.required'));
                }
            }],
        ];
    }

    public function messages(): array
    {
        return [
            'group.required' => 'Group ' . __('validation.required'),
            'key.required' => 'Key ' . __('validation.required'),
        ];
    }
}
