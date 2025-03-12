<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $table = "applications";
    protected $primaryKey = 'request_id';
    public $timestamps = false;

    protected $fillable = [
        "request_type",
        "criteria",
        "requester_name",
        "request_detail",
        "qty",
        "equipment_id",
        "status",
        "received_by",
        "date_needed",
        "return_date",
        "remarks",
        "proof",
        "bureau_id",
    ];

    public function equipments()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id', 'equipment_id');
    }
    
    public function bureaus()
    {
        return $this->belongsTo(Bureau::class, 'bureau_id', 'bureau_id');
    }
}
