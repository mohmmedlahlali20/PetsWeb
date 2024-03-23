<?php

namespace App\Models;


use App\Models\payments;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class commends extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Products::class);
    }



    public function payment()
    {
        return $this->hasOne(payments::class);
    }
}
