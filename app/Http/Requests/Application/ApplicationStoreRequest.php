<?php

namespace App\Http\Requests\Application ;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
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
            'RequestType' => 'required|string',
            'Criteria' => 'required|string',
            'RequesterName' => 'required|string',
            'RequestDetail' => 'required|string',
            'Quantity' => 'required|integer',
            'EquipmentId' => 'required|integer|exists:equipments,equipment_id',
            'Status' => 'required|string',
            'ReceivedBy' => 'required|string',
            'DateNeeded' => 'required|date',
            'ReturnDate' => 'required|date',
            'Remarks' => 'required|string',
            'Proof' => 'nullable|string',    
            'BureauId' => 'required|integer|exists:bureau,bureau_id',
        ];
    }
}
