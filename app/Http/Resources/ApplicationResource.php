<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->request_id,
            "RequestType" => $this->request_type,
            "Criteria" => $this->criteria,
            "RequesterName" => $this->requester_name,
            "RequestDetail" => $this->request_detail,
            "Quantity" => $this->qty,
            "EquipmentID" => [
                "id" => $this->equipment_id ?? null,
                "Brand" => $this->equipments->brands->brand_name ?? null,
                "EquipmentType" => $this->equipments->equipmenttypes->equipment_type_name ?? null,
            ],
            "Status" => $this->status,
            "ReceivedBy" => $this->received_by,
            "DateNeeded" => $this->date_needed,
            "ReturnDate" => $this->return_date,
            "Remarks" => $this->remarks,
            "Proof" => $this->proof,
            "BureauID" => [
                "id" => $this->bureau_id ?? null,
                "BureauName" => $this->bureau->bureau_name ?? null
            ]
        ];
    }
}
