<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => 'required|alpha|min:3',
            'last_name' => 'required|alpha|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => [
                'required',
                // 'min:8',
                // 'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/',
            ],
            'repeat_password' => 'required|same:password',
            'phone' => ['nullable', 'regex:/(^\+?[0-9]{1,3}-?[0-9]{6,14}$)|(^(0)[0-9]{9}$)/'],
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096|min:1024',
        ];
    }
    public function messages(): array
    {
        return [
            'first_name.required' => 'First Name ' . __('validation.required'),

            'last_name.required' => 'Last Name ' . __('validation.required'),

            // 'validation.alpha'=>__('validation.alpha'),
            '*.min' => __('validation.min_string') . ': :min !',

            'email.required' => 'Email ' . __('validation.required'),
            'email.unique' => 'Email ' . __('validation.unique'),

            'password.required' => 'Password ' . __('validation.required'),
            'repeat_password.required' => 'Repeat Password ' . __('validation.required'),
            'repeat_password.same' => 'Repeat Password and Password ' . __('validation.same'),

            'phone.regex' => __('validation.phone'),

            'image.image' => 'Image ' . __('validation.image'),
            'image.uploaded' => __('validation.uploaded') . ' 2 Mb',
        ];
    }
}
