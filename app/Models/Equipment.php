<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table = "equipments";
    
    protected $fillable = [
        "equipment_id",
        "brand_id",
        "equipment_type_id",
        "equipment_model_number",
        "equipment_description",
        "equipment_qty",
        "part_id",
    ];


    public function brands()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'brand_id');
    }

    public function equipmenttypes()
    {
        return $this->belongsTo(EquipmentType::class, 'equipment_type_id', 'equipment_type_id');
    }

    public function parts()
    {
        return $this->belongsTo(Part::class, 'part_id', 'part_id');
    }
}
