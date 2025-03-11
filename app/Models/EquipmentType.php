<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    use HasFactory;

    protected $table = "equipmenttypes";
    
    protected $primaryKey = 'equipment_type_id';

    protected $fillable = [
        'equipment_type_id',
        'equipment_type_name'
    ];


    public function equipments()
    {
        return $this->hasMany(Equipment::class, 'equipment_type_id', 'equipment_type_name');
    }
}
