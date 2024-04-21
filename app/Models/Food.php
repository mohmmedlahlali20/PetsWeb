<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'image', 'quantity'];

    public function commends()
    {
        return $this->hasMany(Commend::class, 'food_id');
    }


    public function comments()
    {
        return $this->hasMany(comments::class);
    }
}
