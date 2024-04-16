<?php

namespace App\Models;

use App\Models\User;
use App\Models\rates;
use App\Models\commends;
use App\Models\comments;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'quantity',
        'image',
        'category_id',
        'age',
        'sex',
        'likes'
        
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(comments::class);
    }

    public function commends()
    {
        return $this->hasMany(commends::class);
    }




}
