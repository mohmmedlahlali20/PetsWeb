<?php

namespace App\Models;

use App\Models\Food;
use App\Models\Products;
use App\Models\Accessoir;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comments extends Model
{

    
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function accessory()
    {
        return $this->belongsTo(Accessoir::class);
    }

    
    protected $fillable = [
        'product_id', // Corrected the attribute name
        'comments',
        'rate_number',
        'user_id',
        'food_id'
    ];
}
