<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessoir extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'image', 'quantity', // Add 'user_id' to fillable fields
    ];

}
