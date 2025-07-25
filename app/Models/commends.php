<?php

namespace App\Models;


use App\Models\User;
use App\Models\payment;
use App\Models\payments;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class commends extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'products_id', 'food_id', 'accessoir_id', 'user_id', 'status', 'total_price'
    ];


    public function product()
    {
        return $this->belongsTo(Products::class , 'products_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function payment()
    {
        return $this->hasOne(payment::class, 'commend_id');
    }
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function accessoir()
    {
        return $this->belongsTo(Accessoir::class, 'accessoir_id');
    }
}
