<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name',
    ];
    public function products()
    {
        return $this->hasMany(Products::class , 'category_id');
    }
}
