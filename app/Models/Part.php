<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $table = "parts";

    protected $primaryKey = 'part_id';

    protected $fillable = [
        'part_id',
        'control_number',
        'part_type',
        'part_description'
    ];

    public function equipments()
    {
        return $this->hasMany(Equipment::class, 'part_id', 'part_id');
    }
}
