<?php

namespace App\Models;


use App\Models\User;
use App\Models\payments;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class commends extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'user_id',
        'commend'
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
        return $this->hasOne(payments::class);
    }
}
