<?php

namespace App\Http\Requests\admin;

use App\Models\Campaign;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CampaignRequest extends FormRequest
{
    public function rules(): array
    {
        $modelId = $this->route('campaign')?->id;

        $rules = [
            'title' => ['required', 'array'],
            'discount_percent' => ['required', 'numeric'],
        ];

        if ($modelId) {
            $rules['title.*'] = ['max:255', function ($attribute, $value, $fail) use ($modelId) {
                $keyValue = Str::of($attribute)->afterLast('.');
                $existingTitles = false;
                $models = Campaign::where('id', '!=', $modelId)->get();
                $existingTitles = false;
                foreach ($models as $model) {
                    $title = $model->getTranslations('title');
                    if (Str::slug($title["$keyValue"]) === Str::slug($value)) {
                        $existingTitles = true;
                        break;
                    }
                }
                if ($existingTitles) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.unique'));
                }
                if (!trim($value)) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.required'));
                }
            }];
        } else {
            $rules['title.*'] = ['max:255', function ($attribute, $value, $fail) {
                $keyValue = Str::of($attribute)->afterLast('.');
                $models = Campaign::get();
                $existingTitles = false;
                foreach ($models as $model) {
                    $title = $model->getTranslations('title');
                    if (Str::slug($title["$keyValue"]) === Str::slug($value)) {
                        $existingTitles = true;
                        break;
                    }
                }

                if ($existingTitles) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.unique'));
                }
                if (!trim($value)) {
                    $fail(Str::headline(Str::replace('.', ' ', $attribute)) . ' ' . __('validation.required'));
                }
            }];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'discount_percent.required' => 'Discount percent ' . __('validation.required'),
            'discount_percent.numeric' => 'Discount percent ' . __('validation.numeric'),
        ];
    }
}
