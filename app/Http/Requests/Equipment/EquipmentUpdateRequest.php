<?php

namespace App\Http\Requests\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Brand' => 'required|string|exists:brands,brand_id',
            'EquipmentType' => 'required|string|exists:equipmenttypes,equipment_type_id',

            'ModelNumber' => 'required|string',
            'Description' => 'required|string',
            'Quantity' => 'required|integer',
        ];
    }
}
