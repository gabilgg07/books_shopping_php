<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Spatie\TranslationLoader\LanguageLine;

class LanguageLineRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('language_line')?->id;

        return [
            'key' => 'required',
            'group'  => [
                'required',
                Rule::unique('language_lines')->where(function ($query) {
                    return $query->where('group', request('group'))
                        ->where('key', request('key'));
                })->ignore($modelId, 'id'),
            ],
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
            'group.unique' => 'Group.Key ' . __('validation.unique'),
            'key.required' => 'Key ' . __('validation.required'),
        ];
    }
}
