<?php

namespace App\Http\Requests\client\account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => [
                'required',
                // 'min:8',
                // 'regex:/^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/',
            ],
            'repeat_password' => 'required|same:password',
            // 'image' => 'required|imaage|mimes:jpeg,jpg,png|max:4096|min:1024',
        ];
    }
}
