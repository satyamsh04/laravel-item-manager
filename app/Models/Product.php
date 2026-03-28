<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;   // 👈 this line is crucial

class Product extends Model   // 👈 must extend Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'manufacturer_id'];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }
}
