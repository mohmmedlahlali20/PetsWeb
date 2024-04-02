<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comments extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
    protected $fillable = [
        'products_id',
        'comments',
        'rate_number',
        'user_id'
    ];
}
