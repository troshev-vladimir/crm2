<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:clients',
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:11',
            'phone_add' => 'string|max:11',
            'site' => 'string|max:50',
            'vk' => 'string|max:50',
            'birth_day' => 'date',
            'division_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email is required!',
            'name.required' => 'Name is required!',
        ];
    }
}
