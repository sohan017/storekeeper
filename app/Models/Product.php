<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'quantity',
    ];

    // public function product()
    // {
    // return $this->hasMany(Sale::class);
    // }

    public function sale()
    {
    return $this->belongTo(Sale::class);
    }

}
