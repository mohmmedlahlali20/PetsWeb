<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rates extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
