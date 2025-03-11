<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->equipment_id,
            "brand" => [
                "id" => $this->brand_id ?? null,
                "brandname" => $this->brands->brand_name ?? null
            ],  
            "EquipmentTypeID" => [
                "id" => $this->equipment_type_id ?? null,
                "EquipmentName" => $this->equipmenttypes->equipment_type_name ?? null
            ],
            "EquipmentModelNumber" => $this->equipment_model_number,
            "EquipmentDescription" => $this->equipment_description,
            "EquipmentQuantity" => $this->equipment_qty,
            "PartID" => [
                "id" => $this->part_id ?? null,
                "Control Number" => $this->parts->control_number ?? null,
                "Type" => $this->parts->part_type ?? null,
                "Description" => $this->parts->part_description ?? null

            ]
        ];
    }
}
