<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Надо указать название',
        ];
    }
}
