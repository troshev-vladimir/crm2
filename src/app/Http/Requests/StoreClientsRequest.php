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
            'name' => 'required|string',
            'division_id' => 'required',
            'userId' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Не заполненно поле email',
            'userId.required' => 'Поле userId обязательное',
            'name.required' => 'Не заполненно поле Имя',
        ];
    }
}
