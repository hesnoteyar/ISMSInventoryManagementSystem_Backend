<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bureau extends Model
{
    use HasFactory;

    protected $table = "bureau";
    protected $primaryKey = 'bureau_id';
    protected $fillable = [
        'bureau_code',
        'bureau_name',
    ];

    public $timestamps = false;

    // This function is not needed if you only want to insert data in the bureaus table
    // public function equipments()
    // {
    //     return $this->hasMany(Equipment::class, 'bureau_id', 'bureau_id');
    // }
}
