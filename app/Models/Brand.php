<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = "brands";

    protected $primaryKey = 'brand_id';
    
    protected $fillable = [
        'brand_name'
        ];

        public $timestamps = false;

    /**
     * Get the equipment associated with the brand.
     */
    public function equipments()
    {
        return $this->hasMany(Equipment::class, 'brand_id', 'brand_name');
    }
}