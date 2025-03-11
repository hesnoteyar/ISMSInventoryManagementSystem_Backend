<?php

namespace App\Http\Requests\Bureau;

use Illuminate\Foundation\Http\FormRequest;

class BureauStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|max:10|unique:bureau,bureau_code',
            'description' => 'required|string|max:255|unique:bureau,bureau_name'
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Bureau code is required',
            'code.max' => 'Bureau code must not exceed 10 characters',
            'code.unique' => 'This bureau code already exists',
            'description.required' => 'Bureau name is required',
            'description.max' => 'Bureau name must not exceed 255 characters',
            'description.unique' => 'This bureau name already exists'
        ];
    }

    public function validated($key = null, $default = null): array
    {
        return [
            'bureau_code' => $this->input('code'),
            'bureau_name' => $this->input('description')
        ];
    }
}