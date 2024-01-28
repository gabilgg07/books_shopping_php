<?php

namespace App\Http\Requests\client;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'phone' => ['required', 'regex:/(^\+?[0-9]{1,3}-?[0-9]{6,14}$)|(^(0)[0-9]{9}$)/'],
            'address' => 'required',
            'country' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Phone ' . __('validation.required'),
            'phone.regex' => __('validation.phone'),

            'address.required' => 'Address ' . __('validation.required'),
            'country.required' => 'Country ' . __('validation.required'),
            'city.required' => 'City ' . __('validation.required'),
            'state.required' => 'State ' . __('validation.required'),
            'zip_code.required' => 'Zip Code ' . __('validation.required'),
        ];
    }
}
